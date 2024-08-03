<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\State;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $model = Contacts::where('Con_Status', '!=', 2)->where('Con_Reg_Id', getSelectedValue())->get();
        return view('backend.admin.contacts.index', compact('model'));
    }
    public function create(Request $request)
    {
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        $lastSelectedDropdownId = getLastSelectedDropdownId($request);

        return view('backend.admin.contacts.create', compact('lastSelectedDropdownId','StateModel'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'Con_Name' => 'required|unique:tbl_contacts,Con_Name|max:255',
        ]);


        try {
            $model = new Contacts();
            $model->Con_Sta_Id = $request->Con_Sta_Id;
            $model->Con_Name = $request->Con_Name;
            $model->Con_Code = $request->Con_Code;
            $model->Con_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Con_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            $request->session()->flash('lastSelectedDropdownId', $request->Con_Sta_Id);
            return redirect()->route('admin.contacts.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function edit($hashedId)
    {
        $Con_Id = decodeId($hashedId);
        $model = Contacts::where('Con_Id', $Con_Id)->first();
        $StateModel = State::where('Sta_Status', '=', 0)->get();
        return view('backend.admin.contacts.edit', compact('model', 'StateModel'));
    }
    public function update(Request $request, $Con_Id)
    {
        $request->validate([]);
        try {
            $model = Contacts::findOrFail($Con_Id);
            $model->Con_Sta_Id = $request->Con_Sta_Id;
            $model->Con_Name = $request->Con_Name;
            $model->Con_Code = $request->Con_Code;
            $model->Con_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Con_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.contacts.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $model = Contacts::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Con_Image}"), public_path("uploads/{$model->Con_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['Con_Status' => 2]);
            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $contacts = Contacts::findOrFail($id);
            $contacts->update(['Con_Status' => '1']);
            return redirect()->route('admin.contacts.index')->with('success', 'Contacts marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $contacts = Contacts::findOrFail($id);
            $contacts->update(['Con_Status' => '0']);
            return redirect()->route('admin.contacts.index')->with('success', 'Contacts marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
