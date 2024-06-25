<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\ContactCategory;
use App\Models\ProductCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactCategoryController extends Controller
{
    public function index(Request $request)
    {
        $model = ContactCategory::where(['ConCat_Reg_Id' => getSelectedValue()])->where('ConCat_Status', '!=', 2)->orderBy('ConCat_CreatedDate', 'desc')->get();

        return view('backend.admin.contactCategory.index', compact('model'));
    }

    public function create()
    {
        
        return view('backend.admin.contactCategory.create' );
    }

    public function store(Request $request)
    {
        try {
            $model = new ContactCategory();
            $model->ConCat_Reg_Id = getSelectedValue();
            $model->ConCat_Title = $request->ConCat_Title;
            $model->ConCat_Value = $request->ConCat_Value;
            $model->ConCat_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->ConCat_CreatedBy = Auth::user()->Log_Id;

            $model->save(); //
            return redirect()->route('admin.contactCategory.create');
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    public function edit($hashedId)
    {
        $ConCat_Id = decodeId($hashedId);
        $model = ContactCategory::where('ConCat_Id', $ConCat_Id)->first();

        return view('backend.admin.contactCategory.edit', compact('model'));
    }

    public function update(Request $request, $ConCat_Id)
    {
        $request->validate([]);

        try {
            $model = ContactCategory::findOrFail($ConCat_Id);
            $model->ConCat_Title = $request->ConCat_Title;
            $model->ConCat_Value = $request->ConCat_Value;
            $model->ConCat_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->ConCat_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
         
            return redirect()->route('admin.contactCategory.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }





    public function active($id)
    {
        try {
            $contactCategory = ContactCategory::findOrFail($id);
            $contactCategory->update(['ConCat_Status' => '1']);
            return redirect()->route('admin.contactCategory.index')->with('success', 'ContactCategory marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $contactCategory = ContactCategory::findOrFail($id);
            $contactCategory->update(['ConCat_Status' => '0']);
            return redirect()->route('admin.contactCategory.index')->with('success', 'ContactCategory marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $model = ContactCategory::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Set_Image}"), public_path("uploads/{$model->Set_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['ConCat_Status' => 2]);

            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
