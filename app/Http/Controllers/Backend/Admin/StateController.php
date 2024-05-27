<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\ProductCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StateController extends Controller
{
    public function index(Request $request)
    {
        $model = State::where('Sta_Status', '!=', 2)->get();
        return view('backend.admin.state.index', compact('model'));
    }
    public function create(Request $request)
    {
        return view('backend.admin.state.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'Sta_Name' => 'required|unique:tbl_state,Sta_Name|max:255',
        ]);

        try {
            $model = new State();
            $model->Sta_Name = $request->Sta_Name;
            $model->Sta_Code = $request->Sta_Code;
            $model->Sta_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Sta_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.state.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($hashedId)
    {
        $Sta_Id = decodeId($hashedId);
        $model = State::where('Sta_Id', $Sta_Id)->first();
        return view('backend.admin.state.edit', compact('model'));
    }
    public function update(Request $request, $Sta_Id)
    {
        $request->validate([]);
        try {
            $model = State::findOrFail($Sta_Id);
            $model->Sta_Name = $request->Sta_Name;
            $model->Sta_Code = $request->Sta_Code;
            $model->Sta_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Sta_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.state.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $model = State::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Sta_Image}"), public_path("uploads/{$model->Sta_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['Sta_Status' => 2]);
            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $state = State::findOrFail($id);
            $state->update(['Sta_Status' => '1']);
            return redirect()->route('admin.state.index')->with('success', 'State marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $state = State::findOrFail($id);
            $state->update(['Sta_Status' => '0']);
            return redirect()->route('admin.state.index')->with('success', 'State marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
