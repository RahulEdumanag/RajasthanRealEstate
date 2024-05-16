<?php

namespace App\Http\Controllers\Backend\Admin;

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

class CredentialLogController extends Controller
{
    public function index()
    {
        $adminuser = CredentialLog::get();
        return view('backend.admin.registration.index', compact('adminuser'));
    }
    public function create()
    {
        return view('backend.admin.registration.create');
    }
    public function edit($Reg_Id)
    {
        $user = CredentialLog::where('Reg_Id', $Reg_Id)->first();
        return view('backend.admin.registration.edit', compact('user'));
    }
    public function store(Request $request)
    {
        try {
            $user = new CredentialLog();
            $user->CreLog_Username = $request->input('CreLog_Username');
            $user->CreLog_Password = $request->input('CreLog_Password');

            $user->save();

            return redirect()
                ->route('admin.registration.create')
                ->with('success', 'User created successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $user = CredentialLog::find($id);

        try {
            $user->CreLog_Username = $request->input('CreLog_Username');
            $user->CreLog_Password = $request->input('CreLog_Password');
            // ... continue with other fields

            $user->save();

            return redirect()
                ->route('admin.registration.index')
                ->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            // Find the Master record by ID
            $credentialLog = CredentialLog::find($id);

            if (!$credentialLog) {
                return back()->with('error' . $e->getMessage());
            }

            // Delete the Master record from the database
            $credentialLog->delete();

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function active($id)
    {
        try {
            $page = CredentialLog::findOrFail($id);
            $page->update(['Reg_Status' => '1']);
            return redirect()
                ->route('admin.registration.index')
                ->with('success', 'CredentialLog marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $page = CredentialLog::findOrFail($id);
            $page->update(['Reg_Status' => '0']);
            return redirect()
                ->route('admin.registration.index')
                ->with('success', 'CredentialLog marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        $user = CredentialLog::findOrFail(Auth::user()->id);

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
