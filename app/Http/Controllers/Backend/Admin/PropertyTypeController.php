<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\ProductCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PropertyTypeController extends Controller
{
    public function index(Request $request)
    {
        $model = PropertyType::where('PTyp_Status', '!=', 2)->get();
        return view('backend.admin.propertyType.index', compact('model'));
    }
    public function create(Request $request)
    {
        return view('backend.admin.propertyType.create');
    }
    public function store(Request $request)
    {
        try {
            $model = new PropertyType();
            $model->PTyp_Reg_Id = getSelectedValue();
            $model->PTyp_Name = $request->PTyp_Name;
            $model->PTyp_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->PTyp_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.propertyType.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($hashedId)
    {
        $PTyp_Id = decodeId($hashedId);
        $model = PropertyType::where('PTyp_Id', $PTyp_Id)->first();
        return view('backend.admin.propertyType.edit', compact('model'));
    }
    public function update(Request $request, $PTyp_Id)
    {
        $request->validate([]);
        try {
            $model = PropertyType::findOrFail($PTyp_Id);
            $model->PTyp_Name = $request->PTyp_Name;
            $model->PTyp_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->PTyp_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.propertyType.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $model = PropertyType::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->PTyp_Image}"), public_path("uploads/{$model->PTyp_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['PTyp_Status' => 2]);
            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $propertyType = PropertyType::findOrFail($id);
            $propertyType->update(['PTyp_Status' => '1']);
            return redirect()->route('admin.propertyType.index')->with('success', 'PropertyType marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $propertyType = PropertyType::findOrFail($id);
            $propertyType->update(['PTyp_Status' => '0']);
            return redirect()->route('admin.propertyType.index')->with('success', 'PropertyType marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
