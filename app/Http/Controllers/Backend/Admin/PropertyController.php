<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Master;
use App\Models\City;
use App\Models\PropertyType;
use App\Models\PropertyFeatures;
use App\Models\Registration;
use App\Models\Admin;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\AdminCredentials;
use Illuminate\Support\Facades\Mail;
class PropertyController extends Controller
{
    public function index(Request $request)
    {
       
            $model = Property::where('PStatus', '!=', 2)->where('PReg_Id', getSelectedValue())->orderBy('PCreatedDate', 'desc')->get();
     
        return view('backend.admin.property.index', compact('model'));
    }
    public function create()
    {
        $PropertyTypeModel = PropertyType::where('PTyp_Status', '=', 0)->get();
        $PropertyFeaturesModel = PropertyFeatures::where('PFea_Status', '=', 0)->get();
        $CityModel = City::where('Cit_Status', '=', 0)->get();
        $ImgMaxSizeModel = getImgMaxSizeModel();
        //    dd($PropertyFeaturesModel);
        return view('backend.admin.property.create', compact('ImgMaxSizeModel', 'PropertyTypeModel', 'PropertyFeaturesModel', 'CityModel'));
    }
    public function store(Request $request)
    {
        try {
            // Retrieve the last property code from the database
            $lastProperty = Property::orderBy('PPropertycode', 'desc')->first();
            
            // Determine the new property code
            if ($lastProperty) {
                $newPropertyCode = 1000;
                $newPropertyCode = $lastProperty->PPropertycode + 1;
            } else {
                $newPropertyCode = 1000;
            }
    
            // Create and save the new property
            $model = new Property();
            $model->PReg_Id = getSelectedValue();
            $model->PPTyp_Id = $request->PPTyp_Id;
            $model->PFea_Id = json_encode($request->PFea_Id); // JSON encode the array
            $model->PCit_Id = $request->PCit_Id;
            $model->PPropertycode = $newPropertyCode; // Set the new property code
            $model->PTitle = $request->PTitle;
            $model->PTag = $request->PTag;
            $model->PShortDesc = $request->PShortDesc;
            $model->PFullDesc = $request->PFullDesc;
            $model->PFeatured = $request->PFeatured;
            $model->PAddress = $request->PAddress;
            $model->PBedRoom = $request->PBedRoom;
            $model->PBathRoom = $request->PBathRoom;
            $model->PSqureFeet = $request->PSqureFeet;
            $model->PMapLink = $request->PMapLink;
            $model->PAmount = $request->PAmount;
            $model->PImages = $request->PImages;
            $model->PPlansImage = $request->PPlansImage;
            $model->PCreatedDate = Carbon::now('Asia/Kolkata');
            $model->PCreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.property.create')->with('success', 'Record added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $PropertyTypeModel = PropertyType::where('PTyp_Status', '=', 0)->get();
        $PropertyFeaturesModel = PropertyFeatures::where('PFea_Status', '=', 0)->get();
        $CityModel = City::where('Cit_Status', '=', 0)->get();
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $PId = decodeId($hashedId);
        $model = Property::where('PId', $PId)->first();
        return view('backend.admin.property.edit', compact('model', 'ImgMaxSizeModel', 'PropertyTypeModel', 'PropertyFeaturesModel', 'CityModel'));
    }
    public function update(Request $request, $PId)
    {
        try {
            $model = Property::findOrFail($PId);
            $model->PPTyp_Id = $request->PPTyp_Id;
            $model->PFea_Id = $request->PFea_Id;
            $model->PCit_Id = $request->PCit_Id;
            $model->PPropertycode = $request->PPropertycode;
            $model->PTitle = $request->PTitle;
            $model->PTag = $request->PTag;
            $model->PShortDesc = $request->PShortDesc;
            $model->PFullDesc = $request->PFullDesc;
            $model->PFeatured = $request->PFeatured;
            $model->PAddress = $request->PAddress;
            $model->PBedRoom = $request->PBedRoom;
            $model->PBathRoom = $request->PBathRoom;
            $model->PSqureFeet = $request->PSqureFeet;
            $model->PMapLink = $request->PMapLink;
            $model->PAmount = $request->PAmount;
            $model->PImages = $request->PImages;
            $model->PPlansImage = $request->PPlansImage;
            $model->save();
            return redirect()->route('admin.property.index')->with('success', 'Record updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = Property::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            foreach (['PFooterLogo', 'PHeaderLogo', 'PFavicon'] as $imageField) {
                $fileToDelete = $model->$imageField;
                if (!empty($fileToDelete)) {
                    $filePath = public_path('uploads') . '/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            $model->update(['PStatus' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $page = Property::findOrFail($id);
            $page->update(['PStatus' => '1']);
            return redirect()->route('admin.property.index')->with('success', 'Property marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Property::findOrFail($id);
            $page->update(['PStatus' => '0']);
            return redirect()->route('admin.property.index')->with('success', 'Property marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
