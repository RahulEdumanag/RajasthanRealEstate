<?php

namespace App\Http\Controllers\Backend\Admin;
use Carbon\Carbon;

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
use Hashids;

use App\Models\User;

class LoginPowerController extends Controller
{
    public function index()
    {
        if (getSelectedValue() == 1) {
            $model = Login::where('Log_Id', '!=', 1)->get();
        } else {
            $model = Login::where('Log_Id', '!=', 1)
                ->where(['Log_Reg_Id' => getSelectedValue()])
                ->get();
        }

        return view('backend.admin.loginPower.index', compact('model'));
    }
    public function create()
    {
        return view('backend.admin.loginPower.create');
    }
    public function edit($hashedId)
    {
        $Log_id = decodeId($hashedId);

        if (!$Log_id) {
            abort(404); // or handle as needed
        }

        $model = Login::where(['Log_Id' => $Log_id])->first();

        return view('backend.admin.loginPower.edit', compact('model'));
    }
    public function store(Request $request)
    {
        try {
            $user = new Login();
            $user->Log_Username = $request->input('Log_Username');
            $user->Log_Password = $request->input('Log_Password');

            $user->save();

            return redirect()->route('admin.loginPower.create')->with('success', 'User created successfully.');
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
            'Log_Username' => 'required',
            'Log_Password' => 'nullable', // Allow empty password field
        ]);

        $user = Login::findOrFail($Log_id);

        // Check if the password field is provided
        if ($request->filled('Log_Password')) {
            $plainPassword = $request->input('Log_Password');

            // Store the plain text password in the session flash data
            session()->flash('password_updated_success', $plainPassword);

            $user->Log_Password = Hash::make($plainPassword);
        }

        // Always update the username
        $user->Log_Username = $request->Log_Username;
        $user->Log_UpdatedDate = Carbon::now('Asia/Kolkata');
        $user->Log_UpdatedBy = auth()->user()->Log_Id;
        $user->save();

        // Store the username in the session flash data
        session()->flash('username_updated_success', $request->Log_Username);

        return redirect()->route('admin.loginPower.index')->with('success', 'Username and password updated successfully.');
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
            $login->update(['Log_Status' => '0']); // Update to 1 for active

            return redirect()->route('admin.loginPower.index')->with('success', 'Login marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $login = Login::findOrFail($id);
            $login->update(['Log_Status' => '1']); // Update to 0 for inactive

            return redirect()->route('admin.loginPower.index')->with('success', 'Login marked as inactive.');
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
