<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CityController extends Controller
{
    public function index(Request $request)
    {
        $model = City::where('Cit_Status', '!=', 2)->get();
        return view('backend.admin.city.index', compact('model'));
    }
    public function create(Request $request)
    {
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        $lastSelectedDropdownId = getLastSelectedDropdownId($request);

        return view('backend.admin.city.create', compact('lastSelectedDropdownId','StateModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new City();
            $model->Cit_Sta_Id = $request->Cit_Sta_Id;
            $model->Cit_Name = $request->Cit_Name;
            $model->Cit_Code = $request->Cit_Code;
            $model->Cit_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Cit_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            $request->session()->flash('lastSelectedDropdownId', $request->Cit_Sta_Id);
            return redirect()->route('admin.city.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($hashedId)
    {
        $Cit_Id = decodeId($hashedId);
        $model = City::where('Cit_Id', $Cit_Id)->first();
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        return view('backend.admin.city.edit', compact('model', 'StateModel'));
    }
    public function update(Request $request, $Cit_Id)
    {
        $request->validate([]);
        try {
            $model = City::findOrFail($Cit_Id);
            $model->Cit_Sta_Id = $request->Cit_Sta_Id;
            $model->Cit_Name = $request->Cit_Name;
            $model->Cit_Code = $request->Cit_Code;
            $model->Cit_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Cit_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.city.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $model = City::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Cit_Image}"), public_path("uploads/{$model->Cit_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['Cit_Status' => 2]);
            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->update(['Cit_Status' => '1']);
            return redirect()->route('admin.city.index')->with('success', 'City marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->update(['Cit_Status' => '0']);
            return redirect()->route('admin.city.index')->with('success', 'City marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
