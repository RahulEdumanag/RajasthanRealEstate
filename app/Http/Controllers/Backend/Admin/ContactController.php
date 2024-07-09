<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use DB;
use Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    

    public function index(Request $request)
    {
        $model = Contact::where(['Con_Reg_Id' => getSelectedValue()])
            ->where('Con_Status', '!=', 2)
            ->orderBy('Con_CreatedDate', 'desc')
            ->get();
        return view('backend.admin.contact.index', compact('model'));
    }
    public function create()
    {
        return view('backend.admin.contact.create');
    }
    public function store(Request $request)
    {
    }
    public function edit($hashedId)
    {
        $Con_Id = decodeId($hashedId);
        $model = Contact::where('Con_Id', $Con_Id)->first();
        return view('backend.admin.contact.edit', compact('model'));
    }

    public function update(Request $request)
    {
    }


    public function softDelete(Request $request)
    {
        $selectedIds = $request->input('selected_records');

        if (!is_array($selectedIds)) {
            return back()->with('error', 'No records selected for deletion.');
        }

        try {
            DB::beginTransaction();

            foreach ($selectedIds as $id) {
                $contact = Contact::find($id);
                if ($contact) {
                    $contact->update(['Con_Status' => 2]);
                    Log::info("deleted contact with ID $id");
                } else {
                    Log::warning("Contact with ID $id not found.");
                }
            }

            DB::commit();
            return back()->with('success', 'Selected records deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error deleting records: ' . $e->getMessage());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    public function destroy($id)
    {
        try {
            $model = Contact::find($id);

            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $model->update(['Con_Status' => '2']);

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['Con_Status' => '1']);
            return redirect()->route('admin.contact.index')->with('success', 'Enquiry as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $contact = Contact::findOrFail($id);

            $contact->update(['Con_Status' => '0']);

            return redirect()->route('admin.contact.index')->with('success', 'Enquiry as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
