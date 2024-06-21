<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $model = Page::with('category')->whereHas('category', fn($query) => $query->where('PagCat_Name', 'Pages'))->get();

        return view('backend.admin.page.index', compact('model'));
    }
    public function create()
    {
        $pagCliId = getSelectedValue();
        $nextSerialOrder = Page::getNextSerialOrder($pagCliId);
        $model = PageCategory::where('PagCat_Reg_Id', $pagCliId)->orderBy('PagCat_Id', 'desc')->get();
        return view('backend.admin.page.create', compact('nextSerialOrder', 'model'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Page();
            $useRegCliId = getSelectedValue();
            $model->Pag_Reg_Id = getSelectedValue();
            $model->Pag_PagCat_Id = $request->Pag_PagCat_Id;
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_URL = $request->Pag_URL;
            $model->Pag_AdminExists = $request->has('Pag_AdminExists') ? $request->Pag_AdminExists : null;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Pag_CreatedBy = Auth::user()->Log_Id;
            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        // Dynamically create a folder named 'Page_images'
                        $folderName = 'Page_images';
                        $destinationPath = public_path("uploads/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('Pag_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Pag_Image
                        $request->file('Pag_Image')->move($destinationPath, $fileName);
                        $model->Pag_Image = "{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            return redirect()->route('admin.page.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $Pag_id = decodeId($hashedId);

        $model = Page::where('Pag_id', $Pag_id)->first();
        $pagCliId = getSelectedValue();
        $nextSerialOrder = Page::getNextSerialOrder($pagCliId);
        $modelCat = PageCategory::where('PagCat_Reg_Id', $pagCliId)->orderBy('PagCat_Id', 'desc')->get();
        return view('backend.admin.page.edit', compact('model', 'modelCat'));
    }
    public function update(Request $request, $Pag_id)
    {
        $request->validate([]);
        try {
            $model = Page::findOrFail($Pag_id);
            if (Auth::user()->EmpRegistration->Emp_Role == '1') {
                $model->Pag_URL = $request->Pag_URL;
                $model->Pag_AdminExists = $request->Pag_AdminExists;
                $model->Pag_PagCat_Id = $request->Pag_PagCat_Id;
            }
            $model->Pag_Name = $request->Pag_Name;

            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_UpdatedBy = Auth::user()->Log_Id;
            $model->Pag_UpdatedDate = Carbon::now('Asia/Kolkata');
            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        // Dynamically create a folder named 'Page_images'
                        $folderName = 'Page_images';
                        $destinationPath = public_path("uploads/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('Pag_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Pag_Image
                        $request->file('Pag_Image')->move($destinationPath, $fileName);
                        $model->Pag_Image = "{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            return redirect()->route('admin.page.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = Page::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $model->delete();
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '1']);
            return redirect()->route('admin.page.index')->with('success', 'Page Category marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '0']);
            return redirect()->route('admin.page.index')->with('success', 'Page Category marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
