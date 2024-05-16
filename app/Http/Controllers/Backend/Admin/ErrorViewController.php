<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Error;
use App\Models\AdminMenu;
use App\Models\Registration;
use Carbon\Carbon;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ErrorViewController extends Controller
{
    public function index(Request $request)
    {
         $model = Error::where('Error_Status', '!=', 2)
        ->orderBy('Error_CreatedDate', 'desc')
        ->get();

        return view('backend.admin.errorsView.index', compact('model'));
    }

    public function create()
    {
        $RegModel = Registration::get();
        $AdminModel = AdminMenu::orderBy('AddMen_SerialOrder', 'asc')->get();

        return view('backend.admin.errorsView.create', compact('AdminModel', 'RegModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Error();

            $model->Error_Reg_Id = $request->input('Error_Reg_Id');
            $model->Error_Title = $request->input('Error_Title');
            $model->Error_Message = $request->input('Error_Message');
            $model->Error_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Error_CreatedBy = getSelectedValue();
            $model->save();
            return redirect()->route('admin.errorsView.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }

    public function edit($hashedId)
    {
        $Error_Id = decodeId($hashedId);
        $model = Error::where('Error_Id', $Error_Id)->first();
        $RegModel = Registration::get();
        $AdminModel = AdminMenu::orderBy('AddMen_SerialOrder', 'asc')->get();
        $selectedAdminMenuIds = explode(',', $model->Add_MenAllo_AddMen_Id);

        return view('backend.admin.errorsView.edit', compact('RegModel', 'model', 'AdminModel', 'selectedAdminMenuIds'));
    }
    public function update(Request $request, $Error_Id)
    {
        $request->validate([]);
        try {
            $model = Error::findOrFail($Error_Id);
            $model->Error_Reg_Id = $request->input('Error_Reg_Id');
            $model->Error_Title = $request->input('Error_Title');
            $model->Error_Message = $request->input('Error_Message');
            $model->Error_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Error_UpdatedBy = getSelectedValue();

            $model->save();
            return redirect()->route('admin.errorsView.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $model = Error::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            // Update Error_Status to 2 (soft delete)
            $model->update(['Error_Status' => 2]);

            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $error = Error::findOrFail($id);
            $error->update(['Error_Status' => '1']);
            return redirect()->route('admin.errorsView.index')->with('success', 'Error marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $error = Error::findOrFail($id);
            $error->update(['Error_Status' => '0']);
            return redirect()->route('admin.errorsView.index')->with('success', 'Error marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function show()
    {
        return view('backend.admin.errorsView.view');
    }
}
