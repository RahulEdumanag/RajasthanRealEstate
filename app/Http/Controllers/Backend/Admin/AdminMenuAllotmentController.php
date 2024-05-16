<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\AdminMenuAllotment;
use App\Models\AdminMenu;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMenuAllotmentController extends Controller
{
    public function index(Request $request)
    {
        $model = AdminMenuAllotment::where('Add_MenAllo_Status', '!=', 2)
            ->with('adminMenu')
            ->where(['Add_MenAllo_Reg_Id' => getSelectedValue()])
            ->orderBy('Add_MenAllo_CreatedDate', 'asc')
            ->get();
         
        return view('backend.admin.adminMenuAllotment.index', compact('model'));
    }

    public function create()
    {
        $AdminModel = AdminMenu::orderBy('AddMen_SerialOrder', 'asc')->where('AddMen_Status', '=', 0)->get();

        return view('backend.admin.adminMenuAllotment.create', compact('AdminModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new AdminMenuAllotment();

            $model->Add_MenAllo_Reg_Id = getSelectedValue();
            $model->Add_MenAllo_AddMen_Id = implode(',', $request->Add_MenAllo_AddMen_Id);
           
            $model->Add_MenAllo_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Add_MenAllo_CreatedBy = getSelectedValue();
            $model->save();
            return redirect()->route('admin.adminMenuAllotment.index')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $Add_MenAllo_Id = decodeId($hashedId);
        $models = AdminMenuAllotment::where(['Add_MenAllo_Reg_Id' => getSelectedValue()])
            ->orderBy('Add_MenAllo_CreatedDate', 'asc')
            ->get(); // Use get() instead of first()
    
        $AdminModel = AdminMenu::orderBy('AddMen_SerialOrder', 'asc')->where('AddMen_Status', '=', 0)->get();
        $selectedAdminMenuIds = [];
    
        foreach ($models as $model) {
            $selectedAdminMenuIds[] = explode(',', $model->Add_MenAllo_AddMen_Id);
        }
    
        return view('backend.admin.adminMenuAllotment.edit', compact('models', 'AdminModel', 'selectedAdminMenuIds'));
    }
    
    public function update(Request $request, $Add_MenAllo_Id)
    {
        $request->validate([]);
        try {
            $model = AdminMenuAllotment::findOrFail($Add_MenAllo_Id);
            $model->Add_MenAllo_AddMen_Id = implode(',', $request->Add_MenAllo_AddMen_Id);

            $model->Add_MenAllo_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Add_MenAllo_UpdatedBy = getSelectedValue();
             
            $model->save();
            return redirect()->route('admin.adminMenuAllotment.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $model = AdminMenuAllotment::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            foreach (['Men_FooterLogo', 'Men_Logo', 'Men_Favicon'] as $imageField) {
                $fileToDelete = $model->$imageField;

                if (!empty($fileToDelete)) {
                    $filePath = public_path('uploads') . '/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            $model->delete();
           
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $adminMenuAllotment = AdminMenuAllotment::findOrFail($id);
            $adminMenuAllotment->update(['Add_MenAllo_Status' => '1']);
            return redirect()->route('admin.adminMenuAllotment.index')->with('success', 'AdminMenuAllotment marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $adminMenuAllotment = AdminMenuAllotment::findOrFail($id);
            $adminMenuAllotment->update(['Add_MenAllo_Status' => '0']);
            return redirect()->route('admin.adminMenuAllotment.index')->with('success', 'AdminMenuAllotment marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
