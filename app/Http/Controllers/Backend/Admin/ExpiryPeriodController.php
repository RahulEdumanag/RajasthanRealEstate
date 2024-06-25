<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\ExpiryPeriod;
use App\Models\Registration;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ExpiryPeriodController extends Controller
{
    public function index(Request $request)
    {
        $model = ExpiryPeriod::where('ExpPer_Status', '!=', 2)->where('ExpPer_Reg_Id', getSelectedValue())->orderBy('ExpPer_CreatedDate', 'desc')->get();
        return view('backend.admin.expiryPeriod.index', compact('model'));
    }
    public function create()
    {
        $RegistrationModel = Registration::where('Reg_Status', '!=', 2)->where('Reg_Id', '!=', 1)->get();
        return view('backend.admin.expiryPeriod.create', compact('RegistrationModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new ExpiryPeriod();
            $model->ExpPer_Reg_Id = $request->ExpPer_Reg_Id;
            $model->ExpPer_StartDate = $request->ExpPer_StartDate;
            $model->ExpPer_EndDate = $request->ExpPer_EndDate;
            $model->ExpPer_Amount = $request->ExpPer_Amount;
            $model->ExpPer_Remark = $request->ExpPer_Remark;
            $model->ExpPer_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->ExpPer_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.expiryPeriod.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $ExpPer_id = decodeId($hashedId);
        $model = ExpiryPeriod::where('ExpPer_id', $ExpPer_id)->first();
        $RegistrationModel = Registration::where('Reg_Status', '!=', 2)->where('Reg_Id', '!=', 1)->get();
        return view('backend.admin.expiryPeriod.edit', compact('model', 'RegistrationModel'));
    }
    public function update(Request $request, $ExpPer_id)
    {
        try {
            $model = ExpiryPeriod::findOrFail($ExpPer_id);
            $model->ExpPer_Reg_Id = $request->ExpPer_Reg_Id;
            $model->ExpPer_StartDate = $request->ExpPer_StartDate;
            $model->ExpPer_EndDate = $request->ExpPer_EndDate;
            $model->ExpPer_Amount = $request->ExpPer_Amount;
            $model->ExpPer_Remark = $request->ExpPer_Remark;
            $model->ExpPer_UpdatedBy = Auth::user()->Log_Id;
            $model->ExpPer_UpdatedDate = Carbon::now('Asia/Kolkata');

            $model->save();

            return redirect()->route('admin.expiryPeriod.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $model = ExpiryPeriod::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $model->update(['ExpPer_Status' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $expiryPeriod = ExpiryPeriod::findOrFail($id);
            $expiryPeriod->update(['ExpPer_Status' => '1']);
            return redirect()->route('admin.expiryPeriod.index')->with('success', 'Gallery Category as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $expiryPeriod = ExpiryPeriod::findOrFail($id);
            $expiryPeriod->update(['ExpPer_Status' => '0']);
            return redirect()->route('admin.expiryPeriod.index')->with('success', 'Gallery Category as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
