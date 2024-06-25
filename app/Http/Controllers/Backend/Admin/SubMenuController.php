<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\SubMenu;
use App\Models\Menu;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubMenuController extends Controller
{
    public function index(Request $request)
    {
        $model = SubMenu::where('SubMen_Status', '!=', 2)
            ->where(['SubMen_Reg_Id' => getSelectedValue()])
            ->orderBy('SubMen_SerialOrder', 'asc')
            ->get();
        return view('backend.admin.submenu.index', compact('model'));
    }
    public function create()
    {
        $nextSerialOrder = SubMenu::getNextSerialOrder(getSelectedValue());
        $model = Menu::where(['Men_Reg_Id' => getSelectedValue()])
            ->where('Men_SubMenuExists', 'on')
            ->orderBy('Men_SerialOrder', 'asc')
            ->get();

        return view('backend.admin.subMenu.create', compact('nextSerialOrder', 'model'));
    }
    public function store(Request $request)
    {
        try {
            $model = new SubMenu();
            $useRegCliId = getSelectedValue();
            $model->SubMen_Men_Id = $request->SubMen_Men_Id;
            $model->SubMen_Reg_Id = getSelectedValue();
            $model->SubMen_Name = $request->SubMen_Name;
            $model->SubMen_URL = $request->SubMen_URL;
            $model->SubMen_AdminExists = $request->SubMen_AdminExists;
            $model->SubMen_ShortDesc = $request->SubMen_ShortDesc;
            $model->SubMen_FullDesc = $request->SubMen_FullDesc;
            $model->SubMen_SerialOrder = $request->SubMen_SerialOrder;
            $model->SubMen_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->SubMen_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.submenu.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $id = decodeId($hashedId);

        $nextSerialOrder = SubMenu::getNextSerialOrder(getSelectedValue());
        $model = SubMenu::findOrFail($id);
        $menuModel = Menu::where('Men_Reg_Id', getSelectedValue())->orderBy('Men_id', 'desc')->get();
        return view('backend.admin.subMenu.edit', compact('nextSerialOrder', 'model', 'menuModel'));
    }
    public function update(Request $request, $SubMen_id)
    {
        $request->validate([]);
        try {
            $model = SubMenu::findOrFail($SubMen_id);
            if (Auth::user()->EmpRegistration->Emp_Role == '1') {
                $model->SubMen_URL = $request->SubMen_URL;
                $model->SubMen_AdminExists = $request->SubMen_AdminExists;
            }

            // if ($model->SubMen_AdminExists == null && Auth::user()->EmpRegistration->Emp_Role == '1') {
            //     $model->SubMen_Name = $request->SubMen_Name;
            // }

            if ($model->SubMen_AdminExists == null || (Auth::user()->EmpRegistration->Emp_Role == '1' && $model->SubMen_AdminExists != null)) {
                $model->SubMen_Name = $request->SubMen_Name;
            }
            $model->SubMen_Men_Id = $request->SubMen_Men_Id;
            $model->SubMen_ShortDesc = $request->SubMen_ShortDesc;
            $model->SubMen_FullDesc = $request->SubMen_FullDesc;
            $model->SubMen_SerialOrder = $request->SubMen_SerialOrder;
            $model->SubMen_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->SubMen_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.submenu.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = SubMenu::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $model->update(['SubMen_Status' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $submenu = SubMenu::findOrFail($id);
            $submenu->update(['SubMen_Status' => '1']);
            return redirect()->route('admin.submenu.index')->with('success', 'Submenu marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $submenu = SubMenu::findOrFail($id);
            $submenu->update(['SubMen_Status' => '0']);
            return redirect()->route('admin.submenu.index')->with('success', 'Submenu marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
