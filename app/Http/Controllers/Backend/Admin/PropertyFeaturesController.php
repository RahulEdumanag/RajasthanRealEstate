<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\PropertyFeatures;
use App\Models\ProductCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PropertyFeaturesController extends Controller
{
    public function index(Request $request)
    {
        $model = PropertyFeatures::where('PFea_Status', '!=', 2)->where('PFea_Reg_Id', getSelectedValue())->get();
        return view('backend.admin.propertyFeatures.index', compact('model'));
    }
    public function create(Request $request)
    {
        return view('backend.admin.propertyFeatures.create');
    }
    public function store(Request $request)
    {
        try {
            $model = new PropertyFeatures();
            $model->PFea_Reg_Id = getSelectedValue();
            $model->PFea_Name = $request->PFea_Name;
            $model->PFea_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->PFea_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.propertyFeatures.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($hashedId)
    {
        $PFea_Id = decodeId($hashedId);
        $model = PropertyFeatures::where('PFea_Id', $PFea_Id)->first();
        return view('backend.admin.propertyFeatures.edit', compact('model'));
    }
    public function update(Request $request, $PFea_Id)
    {
        $request->validate([]);
        try {
            $model = PropertyFeatures::findOrFail($PFea_Id);
            $model->PFea_Name = $request->PFea_Name;
            $model->PFea_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->PFea_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.propertyFeatures.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $model = PropertyFeatures::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->PFea_Image}"), public_path("uploads/{$model->PFea_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['PFea_Status' => 2]);
            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $propertyFeatures = PropertyFeatures::findOrFail($id);
            $propertyFeatures->update(['PFea_Status' => '1']);
            return redirect()->route('admin.propertyFeatures.index')->with('success', 'PropertyFeatures marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $propertyFeatures = PropertyFeatures::findOrFail($id);
            $propertyFeatures->update(['PFea_Status' => '0']);
            return redirect()->route('admin.propertyFeatures.index')->with('success', 'PropertyFeatures marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
