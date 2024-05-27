<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\State;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AreaController extends Controller
{
    // Controller Method
    public function getCitiesByState(Request $request)
    {
        $stateId = $request->input('stateId');
        $cities = City::where('Cit_Sta_Id', $stateId)->get();
        $options = '<option selected disabled>Select City</option>';
        foreach ($cities as $city) {
            $options .= '<option value="' . $city->Cit_Id . '">' . $city->Cit_Name . '</option>';
        }
        return $options;
    }

    public function index(Request $request)
    {
        $model = Area::with('city.state')->where('Are_Status', '!=', 2)->get();
        return view('backend.admin.area.index', compact('model'));
    }
    public function create(Request $request)
    {
 
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        $CityModel = City::where('Cit_Status', '=', 0)->get();
        $lastSelectedDropdownId = getLastSelectedDropdownId($request);

        return view('backend.admin.area.create', compact('StateModel','lastSelectedDropdownId', 'CityModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Area();
            // Handling image uploads
            $model->Are_Sta_Id = $request->Are_Sta_Id;
            $model->Are_Cit_Id = $request->Are_Cit_Id;
            $model->Are_Name = $request->Are_Name;
            $model->Are_Code = $request->Are_Code;
            $model->Are_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Are_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            $request->session()->flash('lastSelectedDropdownId', $request->Are_Cit_Id);

            return redirect()->route('admin.area.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($hashedId)
    {
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        $Are_Id = decodeId($hashedId);
        $model = Area::where('Are_Id', $Are_Id)->first();
        $CityModel = City::where('Cit_Status', '=', 0)->get();
        return view('backend.admin.area.edit', compact('StateModel','model', 'CityModel'));
    }
    public function update(Request $request, $Are_Id)
    {
        $request->validate([]);
        try {
            $model = Area::findOrFail($Are_Id);
            $model->Are_Sta_Id = $request->Are_Sta_Id;
            $model->Are_Cit_Id = $request->Are_Cit_Id;
            $model->Are_Name = $request->Are_Name;
            $model->Are_Code = $request->Are_Code;
            $model->Are_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Are_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.area.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $model = Area::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Are_Image}"), public_path("uploads/{$model->Are_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['Are_Status' => 2]);
            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $Area = Area::findOrFail($id);
            $Area->update(['Are_Status' => '1']);
            return redirect()->route('admin.area.index')->with('success', 'Area marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $Area = Area::findOrFail($id);
            $Area->update(['Are_Status' => '0']);
            return redirect()->route('admin.area.index')->with('success', 'Area marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
