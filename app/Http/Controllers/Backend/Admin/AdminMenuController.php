<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Error;
use App\Models\AdminMenu;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminMenuController extends Controller
{
    public function index(Request $request)
    {
        $maxSerialOrderLength = \App\Models\AdminMenu::max(DB::raw('LENGTH(AddMen_SerialOrder)'));

        $model = AdminMenu::where('AddMen_Status', '!=', 2)
            ->orderByRaw("LPAD(AddMen_SerialOrder, $maxSerialOrderLength, 0) ASC")
            ->get();

        return view('backend.admin.adminMenu.index', compact('model'));
    }

    public function create()
    {
        return view('backend.admin.adminMenu.create');
    }
    public function store(Request $request)
    {
        try {
            $model = new AdminMenu();

            $model->AddMen_Reg_Id = getSelectedValue();
            $model->AddMen_Name = $request->AddMen_Name;
            $model->AddMen_URL = $request->AddMen_URL;
            $model->AddMen_SerialOrder = $request->AddMen_SerialOrder;
            $model->AddMen_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->AddMen_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.adminMenu.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            $error = new Error();
            $error->Error_Reg_Id = getSelectedValue();
            $error->Error_Message = $e->getMessage();
            $error->Error_CreatedDate = Carbon::now('Asia/Kolkata');

            $error->Error_CreatedBy = Auth::user()->Log_Id;
            $error->save();

            return redirect()->route('admin.error.index')->with('success', 'Data added successfully.');
        }
    }
    public function edit($hashedId)
    {
        $AddMen_Id = decodeId($hashedId);
        $model = AdminMenu::where('AddMen_Id', $AddMen_Id)->first();

        return view('backend.admin.adminMenu.edit', compact('model'));
    }
    public function update(Request $request, $AddMen_Id)
    {
        $request->validate([]);
        try {
            $model = AdminMenu::findOrFail($AddMen_Id);

            $model->AddMen_Name = $request->AddMen_Name;
            $model->AddMen_URL = $request->AddMen_URL;
            $model->AddMen_SerialOrder = $request->AddMen_SerialOrder;

            $model->AddMen_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->AddMen_UpdatedBy = Auth::user()->Log_Id;

            $model->save();
            return redirect()->route('admin.adminMenu.index')->with('success', ' Updated successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            $error = new Error();
            $error->Error_Reg_Id = getSelectedValue();
            $error->Error_Message = $e->getMessage();
            $error->Error_CreatedDate = Carbon::now('Asia/Kolkata');

            $error->Error_CreatedBy = Auth::user()->Log_Id;
            $error->save();

            return redirect()->route('admin.error.index')->with('success', 'Data added successfully.');
        }
    }

    public function destroy($id)
    {
        try {
            $model = AdminMenu::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            $model->update(['AddMen_Status' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $adminMenu = AdminMenu::findOrFail($id);
            $adminMenu->update(['AddMen_Status' => '1']);
            return redirect()->route('admin.adminMenu.index')->with('success', 'AdminMenu marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $adminMenu = AdminMenu::findOrFail($id);
            $adminMenu->update(['AddMen_Status' => '0']);
            return redirect()->route('admin.adminMenu.index')->with('success', 'AdminMenu marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
