<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Master;
use App\Models\City;
use App\Models\State;
use App\Models\Area;

use App\Models\PropertyType;
use App\Models\PropertyFeatures;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;
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
        $model = Property::where('PStatus', '!=', 2)->where('PStatus', '!=', 3)->where('PReg_Id', getSelectedValue())->orderBy('PCreatedDate', 'desc')->get();
        return view('backend.admin.property.index', compact('model'));
    }
    public function create(Request $request)
    {
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        $PropertyTypeModel = PropertyType::where('PTyp_Status', '=', 0)->where('PTyp_Reg_Id', getSelectedValue())->get();
        $PropertyFeaturesModel = PropertyFeatures::where('PFea_Status', '=', 0)->get();
        $CityModel = City::where('Cit_Status', '=', 0)->orderBy('Cit_CreatedDate', 'desc')->get();
        $AreaModel = Area::where('Are_Status', '=', 0)->orderBy('Are_CreatedDate', 'desc')->get();

        $lastSelectedPSta_Id = $request->session()->get('lastSelectedPSta_Id');
        $lastSelectedPCit_Id = $request->session()->get('lastSelectedPCit_Id');
        $lastSelectedPAre_Id = $request->session()->get('lastSelectedPAre_Id');
        $lastSelectedPPTyp_Id = $request->session()->get('lastSelectedPPTyp_Id');
        $lastSelectedPFeatured = $request->session()->get('lastSelectedPFeatured');
        $lastSelectedPBedRoom = $request->session()->get('lastSelectedPBedRoom');
        $lastSelectedPBathRoom = $request->session()->get('lastSelectedPBathRoom');
        $lastSelectedPType = $request->session()->get('lastSelectedPType');

        $ImgMaxSizeModel = getImgMaxSizeModel();
        //    dd($PropertyFeaturesModel);
        return view('backend.admin.property.create', compact('lastSelectedPType','lastSelectedPBedRoom','lastSelectedPBathRoom','lastSelectedPFeatured', 'lastSelectedPPTyp_Id', 'lastSelectedPAre_Id', 'lastSelectedPCit_Id', 'lastSelectedPSta_Id', 'AreaModel', 'StateModel', 'ImgMaxSizeModel', 'PropertyTypeModel', 'PropertyFeaturesModel', 'CityModel'));
    }
    public function getCitiesByState(Request $request)
{
    try {
        $cities = City::where('Cit_Status', '=', 0)
            ->where('Cit_Sta_Id', $request->stateId)
            ->get();
        
        $options = '<option selected disabled>Select City Name</option>';
        foreach ($cities as $city) {
            $options .= "<option value='{$city->Cit_Id}'>{$city->Cit_Name}</option>";
        }
        
        return response($options);
    } catch (\Exception $e) {
        \Log::error('Error fetching cities: ' . $e->getMessage());
        return response()->json(['error' => 'Error fetching cities'], 500);
    }
}

public function getAreasByCity(Request $request)
{
    try {
        $cityId = $request->cityId;
        $areas = Area::where('Are_Status', '=', 0)
            ->where('Are_Cit_Id', $cityId)
            ->get();
        
        $options = '<option selected disabled>Select Area</option>';
        foreach ($areas as $area) {
            $options .= "<option value='{$area->Are_Id}'>{$area->Are_Name}</option>";
        }
        
        return response($options);
    } catch (\Exception $e) {
        \Log::error('Error fetching areas: ' . $e->getMessage());
        return response()->json(['error' => 'Error fetching areas'], 500);
    }
}



    public function store(Request $request)
    {
        try {
            $lastProperty = Property::orderBy('PPropertycode', 'desc')->first();
            $newPropertyCode = $lastProperty ? $lastProperty->PPropertycode + 1 : 1000;
            if ($request->hasFile('PImages') && is_array($request->file('PImages'))) {
                if (count($request->file('PImages')) > 10) {
                    return redirect()->back()->with('error', 'You can only upload a maximum of 10 images at once.');
                }
            }
            if ($request->hasFile('PPlansImage') && is_array($request->file('PPlansImage'))) {
                if (count($request->file('PPlansImage')) > 10) {
                    return redirect()->back()->with('error', 'You can only upload a maximum of 10 images at once.');
                }
            }
            $model = new Property();
            $model->PReg_Id = getSelectedValue();
            $model->PPTyp_Id = $request->PPTyp_Id;
            $model->PPFea_Id = json_encode($request->PPFea_Id);
            $model->PSta_Id = $request->PSta_Id;
            $model->PCit_Id = $request->PCit_Id;
            $model->PAre_Id = $request->PAre_Id;

            $model->PPropertycode = $newPropertyCode;
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
            $model->PType = $request->PType;
            $images = [];
            $planImages = [];
            if ($request->hasFile('PImages')) {
                foreach ($request->file('PImages') as $file) {
                    if ($file->isValid()) {
                        $extension = strtolower($file->getClientOriginalExtension());
                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                            $subfolderName = getSelectedValue();
                            $folderName = 'Gallery_images';
                            $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");
                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0777, true);
                            }
                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $file->move($destinationPath, $fileName);
                            $images[] = "{$subfolderName}/{$folderName}/{$fileName}";
                        }
                    }
                }
            }
            if ($request->hasFile('PPlansImage')) {
                foreach ($request->file('PPlansImage') as $file) {
                    if ($file->isValid()) {
                        $extension = strtolower($file->getClientOriginalExtension());
                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                            $subfolderName = getSelectedValue();
                            $folderName = 'Plan_images';
                            $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");
                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0777, true);
                            }
                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $file->move($destinationPath, $fileName);
                            $planImages[] = "{$subfolderName}/{$folderName}/{$fileName}";
                        }
                    }
                }
            }
            $model->PImages = implode(',', $images);
            $model->PPlansImage = implode(',', $planImages);
            $model->PCreatedDate = Carbon::now('Asia/Kolkata');
            $model->PCreatedBy = Auth::user()->Log_Id;
            $model->save();

            $request->session()->flash('lastSelectedPSta_Id', $request->PSta_Id);
            $request->session()->flash('lastSelectedPCit_Id', $request->PCit_Id);
            $request->session()->flash('lastSelectedPAre_Id', $request->PAre_Id);
            $request->session()->flash('lastSelectedPPTyp_Id', $request->PPTyp_Id);
            $request->session()->flash('lastSelectedPFeatured', $request->PFeatured);
            $request->session()->flash('lastSelectedPBedRoom', $request->PBedRoom);
            $request->session()->flash('lastSelectedPBathRoom', $request->PBathRoom);
            $request->session()->flash('lastSelectedPType', $request->PType);

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
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        $PropertyTypeModel = PropertyType::where('PTyp_Status', '=', 0)->where('PTyp_Reg_Id', getSelectedValue())->get();
        $PropertyFeaturesModel = PropertyFeatures::where('PFea_Status', '=', 0)->get();
        $CityModel = City::where('Cit_Status', '=', 0)->get();

        $ImgMaxSizeModel = getImgMaxSizeModel();
        $PId = decodeId($hashedId);
        $model = Property::with('city.state')->where('PId', $PId)->first();
        $AreaModel = $model->city ? $model->city->areas : collect();
        $selectedCityId = $model->PCit_Id; // Get the selected city ID

        return view('backend.admin.property.edit', compact('AreaModel', 'StateModel', 'model', 'ImgMaxSizeModel', 'PropertyTypeModel', 'PropertyFeaturesModel', 'CityModel', 'selectedCityId'));
    }
    public function update(Request $request, $PId)
    {
        try {
            $model = Property::findOrFail($PId);
            // Update other properties
            $model->PPTyp_Id = $request->PPTyp_Id;
            $model->PPFea_Id = $request->PPFea_Id;
            $model->PSta_Id = $request->PSta_Id;
            $model->PCit_Id = $request->PCit_Id;
            $model->PAre_Id = $request->PAre_Id;

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
            $model->PType = $request->PType;

            // Update images if new files are uploaded
            if ($request->hasFile('PImages')) {
                // Delete old images
                $this->deleteImages($model->PImages);
                $images = [];
                foreach ($request->file('PImages') as $file) {
                    if ($file->isValid()) {
                        $extension = strtolower($file->getClientOriginalExtension());
                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                            $subfolderName = getSelectedValue();
                            $folderName = 'Gallery_images';
                            $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");
                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0777, true);
                            }
                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $file->move($destinationPath, $fileName);
                            $images[] = "{$subfolderName}/{$folderName}/{$fileName}";
                        }
                    }
                }
                // Update the PImages property
                $model->PImages = implode(',', $images);
            }
            if ($request->hasFile('PPlansImage')) {
                // Delete old plan images
                $this->deleteImages($model->PPlansImage);
                $planImages = [];
                foreach ($request->file('PPlansImage') as $file) {
                    if ($file->isValid()) {
                        $extension = strtolower($file->getClientOriginalExtension());
                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                            $subfolderName = getSelectedValue();
                            $folderName = 'Plan_images';
                            $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");
                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0777, true);
                            }
                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $file->move($destinationPath, $fileName);
                            $planImages[] = "{$subfolderName}/{$folderName}/{$fileName}";
                        }
                    }
                }
                // Update the PPlansImage property
                $model->PPlansImage = implode(',', $planImages);
            }
            $model->save();
            return redirect()->route('admin.property.index')->with('success', 'Record updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    private function deleteImages($imagePaths)
    {
        $imagePathsArray = explode(',', $imagePaths);
        foreach ($imagePathsArray as $imagePath) {
            // Assuming the images are stored in the public directory
            $fullImagePath = public_path("uploads/{$imagePath}");
            if (file_exists($fullImagePath)) {
                unlink($fullImagePath);
            }
        }
    }

    public function destroy($id)
    {
        try {
            $model = Property::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            // Delete PImages and PPlansImage
            $imagesToDelete = [];
            if (!empty($model->PImages)) {
                $imagesToDelete = array_merge($imagesToDelete, explode(',', $model->PImages));
            }
            if (!empty($model->PPlansImage)) {
                $imagesToDelete = array_merge($imagesToDelete, explode(',', $model->PPlansImage));
            }
            foreach ($imagesToDelete as $image) {
                $imagePath = public_path("uploads/{$image}"); // Adjust the folder structure as needed
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Update property status
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
