<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Login;
use App\Models\CredentialLog;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use View;
use DB;
use App\Models\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index()
    {
        $model = Login::where('Log_Id', '!=', 1)
            ->where(['Log_Reg_Id' => getSelectedValue()])
            ->get();
        return view('backend.admin.login.index', compact('model'));
    }
    public function create()
    {
        return view('backend.admin.login.create');
    }
    public function edit($hashedId)
    {
        $Log_id = decodeId($hashedId);

        $model = Login::where(['Log_Id' => $Log_id])->first();
        return view('backend.admin.login.edit', compact('model'));
    }
    public function store(Request $request)
    {
        try {
            $user = new Login();
            $user->Log_Username = $request->input('Log_Username');
            $user->Log_Password = $request->input('Log_Password');

            $user->save();

            return redirect()
                ->route('admin.login.create')
                ->with('success', 'User created successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function update(Request $request, $Log_id)
    {
        $request->validate([
            'Old_password' => 'required',
            'Log_Password' => 'required|min:4', // You can customize the password validation rules
        ]);

        $user = Login::find(auth()->user()->Log_Id);

        // Verify old password
        if (!Hash::check($request->input('Old_password'), $user->Log_Password)) {
            return back()->withErrors(['Old_password' => 'Incorrect old password']);
        }

        // Update password
        $user->Log_Password = Hash::make($request->input('Log_Password'));
        $user->Log_UpdatedDate = Carbon::now('Asia/Kolkata');
        $user->Log_UpdatedBy = auth()->user()->Log_Id;
        $user->save();

        $credentialLog = new CredentialLog();
        $credentialLog->CreLog_Reg_Id = $user->Log_Reg_Id;
        $credentialLog->CreLog_CreatedDate = Carbon::now('Asia/Kolkata');
        $credentialLog->CreLog_UpdatedDate = Carbon::now('Asia/Kolkata');
        $credentialLog->CreLog_CreatedBy = auth()->user()->Log_Id;
        // Reuse the values from $adminModal
        $credentialLog->CreLog_Username = auth()->user()->Log_Username;
        $credentialLog->CreLog_Password = $user->Log_Password;
        $credentialLog->save();

        return redirect()
            ->route('admin.login.index')
            ->with('success', 'Password updated successfully.');
    }

    public function destroy($id)
    {
        try {
            // Find the Master record by ID
            $login = Login::find($id);

            if (!$login) {
                return back()->with('error' . $e->getMessage());
            }

            // Delete the Master record from the database
            $login->delete();

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function active($id)
    {
        try {
            $login = Login::findOrFail($id);
            $login->update(['Log_Status' => '0']);

            return redirect()
                ->route('admin.login.index')
                ->with('success', 'Login marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $login = Login::findOrFail($id);
            $login->update(['Log_Status' => '1']);

            return redirect()
                ->route('admin.login.index')
                ->with('success', 'Login marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        $user = Login::findOrFail(Auth::user()->id);

        $rules = [
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['type' => 'success', 'message' => 'Password successfully updated']);
    }
}
