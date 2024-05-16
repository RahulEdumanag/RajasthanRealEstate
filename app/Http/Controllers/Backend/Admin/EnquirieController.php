<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Enquirie;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EnquirieController extends Controller
{
     

    public function index(Request $request)
    {
        $model = Enquirie::where(['Enq_Reg_Id' => getSelectedValue()])->get();
        return view('backend.admin.enquirie.index', compact('model'));
    }
    public function create()
    {
        return view('backend.admin.enquirie.create');
    }
    public function store(Request $request)
    {
    }
    public function edit($hashedId)
    {

        $Enq_Id = decodeId($hashedId);
        $model = Enquirie::where('Enq_Id', $Enq_Id)->first();
        return view('backend.admin.enquirie.edit', compact('model'));
    }
 
    public function update(Request $request)
    {
    }
    public function destroy($id)
    {
        try {
            $model = Enquirie::find($id);

            if (!$model) {
                return back()->with('error', 'Record not found.');
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
            $enquirie = Enquirie::findOrFail($id);
            $enquirie->update(['Enq_Status' => '1']);
            return redirect()
                ->route('admin.enquirie.index')
                ->with('success', 'Enquiry as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $enquirie = Enquirie::findOrFail($id);

            $enquirie->update(['Enq_Status' => '0']);

            return redirect()
                ->route('admin.enquirie.index')
                ->with('success', 'Enquiry as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
