<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login()
    {
        return view('auth.admin.login');
    }

    public function registration()
    {
        return view('auth.admin.registration');
    }
    public function loginAdmin(Request $request)
    {
        try {
            $this->validate($request, [
                'Log_Username' => 'required',
                'Log_Password' => 'required',
            ]);

            $credentials = [
                'Log_Username' => $request->Log_Username,
                'password' => $request->Log_Password,
                'Log_Status' => 1,
                'Log_DeletedDate' => null,
            ];

 
            if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
                $user = Auth::guard('admin')->user();
                $token = $user->fcreateToken('adminApiToken')->accessToken;

                // Cookie::queue('access_token', $token, 4500);
                session(['access_token' => $token]);
                return redirect()->route('admin.dashboard');
            } else {
                 return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['Log_Username' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
             return redirect()
                ->back()
                ->withInput()
                ->withErrors(['Log_Username' => 'An error occurred during login']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->forget('access_token');
        return redirect()->route('admin.auth.login');
    }
    // public function logout()
    // {
    //     Auth::guard('admin')->logout();
    //     Cookie::forget('access_token');
    //     return redirect()->route('admin.auth.login');
    // }

    protected function authenticated(Request $request, $user)
    {
        // Extend the session lifetime
        $request->session()->extendExpiration();

        // Perform your other logic as needed
    }
}
