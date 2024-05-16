<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Admin;
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

class AdminController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function allAdmin()
    {
    }

    public function profile()
    {
        $user = Auth::user();
        return view('backend.admin.admin.profile', compact('user'));
    }

    public function edit($id)
    {
        return view('backend.admin.admin.edit_profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }

    public function change_password()
    {
        return view('backend.admin.admin.change_password');
    }

    public function update_password(Request $request)
    {
        return response()->json(['type' => 'success', 'message' => 'Password successfully updated']);
    }

    public function barcode()
    {
        return view('backend.admin.example.barcode');
    }

    public function passport()
    {
        return view('backend.admin.example.passport');
    }
}
