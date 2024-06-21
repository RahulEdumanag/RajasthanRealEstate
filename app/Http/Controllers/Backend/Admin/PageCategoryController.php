<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\PageCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageCategoryController extends Controller
{
    public function index(Request $request)
    {
        $model = PageCategory::
            // ->where(['PagCat_Reg_Id' => getSelectedValue()])
           get();

        return view('backend.admin.pageCategory.index', compact('model'));
    }

    public function create()
    {
        $pagCatCliId = getSelectedValue();
        $nextSerialOrder = PageCategory::getNextSerialOrder($pagCatCliId);

        return view('backend.admin.pageCategory.create', compact('nextSerialOrder'));
    }
    public function store(Request $request)
    {
         
        try {
            $model = new PageCategory();
            $useRegCliId = getSelectedValue();
            $model->PagCat_Reg_Id = $useRegCliId;
            $model->PagCat_Name = $request->PagCat_Name;
            $model->PagCat_URL = $request->PagCat_URL;
            $model->PagCat_AdminExists = $request->PagCat_AdminExists;
            $model->PagCat_ShortDescExists = $request->PagCat_ShortDescExists;
            $model->PagCat_FullDescExists = $request->PagCat_FullDescExists;
            $model->PagCat_ShortDesc = $request->PagCat_ShortDesc;
            $model->PagCat_FullDesc = $request->PagCat_FullDesc;
            $model->PagCat_SerialOrder = $request->PagCat_SerialOrder;
            $model->PagCat_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->PagCat_CreatedBy = Auth::user()->Log_Id;
            if ($request->hasFile('PagCat_Image')) {
                $extension = strtolower($request->file('PagCat_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('PagCat_Image')->isValid()) {
                        $subfolderName = getSelectedValue();

                        $folderName = 'PageCategory_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('PagCat_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming PagCat_Image
                        $request->file('PagCat_Image')->move($destinationPath, $fileName);
                        $model->PagCat_Image = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            return redirect()->route('admin.pageCategory.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $PagCat_id = decodeId($hashedId);
        $model = PageCategory::where('PagCat_id', $PagCat_id)->first();

        return view('backend.admin.pageCategory.edit', compact('model'));
    }
    public function update(Request $request, $PagCat_id)
    {
         

        try {
            $model = PageCategory::findOrFail($PagCat_id);
            $model->PagCat_Name = $request->PagCat_Name;
            $model->PagCat_URL = $request->PagCat_URL;
            $model->PagCat_AdminExists = $request->PagCat_AdminExists;
            $model->PagCat_ShortDescExists = $request->PagCat_ShortDescExists;
            $model->PagCat_FullDescExists = $request->PagCat_FullDescExists;
            $model->PagCat_ShortDesc = $request->PagCat_ShortDesc;
            $model->PagCat_FullDesc = $request->PagCat_FullDesc;
            $model->PagCat_SerialOrder = $request->PagCat_SerialOrder;
            $model->PagCat_UpdatedBy = Auth::user()->Log_Id;
            $model->PagCat_UpdatedDate = Carbon::now('Asia/Kolkata');
            if ($request->hasFile('PagCat_Image')) {
                $extension = strtolower($request->file('PagCat_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('PagCat_Image')->isValid()) {
                        $subfolderName = getSelectedValue();

                        $folderName = 'PageCategory_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('PagCat_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming PagCat_Image
                        $request->file('PagCat_Image')->move($destinationPath, $fileName);
                        $model->PagCat_Image = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            return redirect()->route('admin.pageCategory.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $model = PageCategory::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            if (!empty($model->Pag_Image)) {
                $imagePath = public_path("uploads/{$model->PagCat_Image}");
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                } else {
                    return back()->with('error', 'Image file not found.');
                }
            }
            $model->update(['PagCat_Status' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $pageCategory = PageCategory::findOrFail($id);
            $pageCategory->update(['PagCat_Status' => '1']);
            return redirect()->route('admin.pageCategory.index')->with('success', 'Page marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $pageCategory = PageCategory::findOrFail($id);
            $pageCategory->update(['PagCat_Status' => '0']);
            return redirect()->route('admin.pageCategory.index')->with('success', 'Page marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
