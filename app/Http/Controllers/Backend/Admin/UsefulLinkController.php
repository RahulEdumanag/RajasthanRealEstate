<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsefulLinkController extends Controller
{
    public function index(Request $request)
    {
        $model = Page::where('Pag_Status', '!=', 2)
            ->where(['Pag_Reg_Id' => getSelectedValue()])
            ->with('category')
            ->whereHas('category', function ($query) {
                $query->where('PagCat_Name', 'UsefulLink');
            })
            ->orderBy('tbl_page.Pag_SerialOrder', 'asc')
            ->get();

        return view('backend.admin.usefulLink.index', compact('model'));
    }

    public function create()
    {
        $nextSerialOrder = getNextSerialOrder(getSelectedValue(), 'UsefulLink');
        $model = PageCategory::where('PagCat_Name', 'UsefulLink')->where('PagCat_Status', '0')->orderBy('PagCat_Id', 'desc')->get();

        return view('backend.admin.usefulLink.create', compact('nextSerialOrder', 'model'));
    }

    public function store(Request $request)
    {
        try {
            $model = new Page();
            $useRegCliId = getSelectedValue();
            $model->Pag_Reg_Id = $useRegCliId;

            $model->Pag_PagCat_Id = $request->Pag_PagCat_Id;
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_URL = $request->Pag_URL;
            $model->Pag_AdminExists = $request->Pag_AdminExists;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Pag_CreatedBy = $useRegCliId;
            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        // Dynamically create a folder named 'useFulLink'
                        $folderName = 'useFulLink';
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
            return redirect()->route('admin.usefulLink.create')->with('success', 'Data added successfully.');
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
        return view('backend.admin.usefulLink.edit', compact('model'));
    }
    public function update(Request $request, $Pag_id)
    {
        try {
            $model = Page::findOrFail($Pag_id);
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_URL = $request->Pag_URL;
            $model->Pag_AdminExists = $request->Pag_AdminExists;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_UpdatedBy = Auth::user()->Log_Id;
            $model->Pag_UpdatedDate = Carbon::now('Asia/Kolkata');

            // Use session value or authenticated user's ID based on condition
            $useRegCliId = Session::get('selectedValue') ?? Auth::user()->Log_Reg_Id;
            $model->Pag_Reg_Id = $useRegCliId;

            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        // Dynamically create a folder named 'useFulLink'
                        $folderName = 'useFulLink';
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
            return redirect()->route('admin.usefulLink.index')->with('success', 'Updated successfully.');
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
            $model->update(['Pag_Status' => 2]);

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
            return redirect()->route('admin.usefulLink.index')->with('success', 'UsefulLink marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '0']);

            return redirect()->route('admin.usefulLink.index')->with('success', 'UsefulLink marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
