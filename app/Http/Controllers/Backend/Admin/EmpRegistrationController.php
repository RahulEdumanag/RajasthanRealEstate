<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Models\Login;
use App\Models\CredentialLog;
use App\Models\Registration;
use App\Models\EmpRegistration;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use View;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class EmpRegistrationController extends Controller
{
    public function index()
    {
        if (getSelectedValue() == 1) {
            $adminuser = EmpRegistration::where('Emp_Id', '!=', 1)->whereNull('Emp_DeletedDate')->get();
        } else {
            $adminuser = EmpRegistration::where('Emp_Id', '!=', 1)
                ->where(['Emp_Reg_Id' => getSelectedValue()])
                ->whereNull('Emp_DeletedDate')
                ->get();
        }

        return view('backend.admin.empRegistration.index', compact('adminuser'));
    }

    public function create()
    {
        $adminuser = Registration::where('Reg_Id', '!=', 1)->whereNull('Reg_DeletedDate')->get();

        return view('backend.admin.empRegistration.create', compact('adminuser'));
    }
    public function edit($hashedId)
    {
        $Emp_Id = decodeId($hashedId);
        $user = EmpRegistration::where('Emp_Id', $Emp_Id)->first();
        $adminuser = Registration::where('Reg_Id', '!=', 1)->whereNull('Reg_DeletedDate')->get();

        return view('backend.admin.empRegistration.edit', compact('user', 'adminuser'));
    }
    public function store(Request $request)
    {
         
        try {
            DB::beginTransaction();

            $user = new EmpRegistration();
            $user->Emp_Role = $request->input('Emp_Role');
            $user->Emp_Reg_Id = getSelectedValue();
            if ($request->hasFile('Emp_Logo')) {
                $extension = strtolower($request->file('Emp_Logo')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Emp_Logo')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'EmployeeReg_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");
                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $extension = $request->file('Emp_Logo')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Emp_Logo
                        $request->file('Emp_Logo')->move($destinationPath, $fileName);
                        $user->Emp_Logo = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $user->Emp_Name = $request->input('Emp_Name');
            $user->Emp_Contact = $request->input('Emp_Contact');
            $user->Emp_Email = $request->input('Emp_Email');
            $user->Emp_Address = $request->input('Emp_Address');
            $user->Emp_Remark = $request->input('Emp_Remark');
            $user->Emp_StartDate = $request->input('Emp_StartDate');
            $user->Emp_ExpiryPeriod = $request->input('Emp_ExpiryPeriod');
            $user->Emp_TwoStepVerification = $request->input('Emp_TwoStepVerification');
            $user->Emp_CreatedBy = Auth::user()->Log_Id;
            $user->Emp_CreatedDate = Carbon::now('Asia/Kolkata');

            $user->save();
            if ($user->Emp_Id) {
                $adminModal = new Login();
                $adminModal->Log_Emp_Id = $user->Emp_Id;
                $adminModal->Log_Reg_Id = $user->Emp_Reg_Id;
                $adminModal->Log_CreatedDate = Carbon::now('Asia/Kolkata');
                $adminModal->Log_CreatedBy = Auth::user()->Log_Id;
                $adminModal->Log_Username = $user->Emp_Email;
                $password = generateNumericPassword();

                $adminModal->Log_Password = Hash::make($password);

                $adminModal->save();

                // Create CredentialLog entry
                $credentialLog = new CredentialLog();
                $credentialLog->CreLog_Emp_Id = $user->Emp_Id;
                $credentialLog->CreLog_Reg_Id = $user->Emp_Reg_Id;
                $credentialLog->CreLog_CreatedDate = Carbon::now('Asia/Kolkata');
                $credentialLog->CreLog_CreatedBy = Auth()->user()->Log_Id;
                // Reuse the values from $adminModal
                $credentialLog->CreLog_Username = $adminModal->Log_Username;
                $credentialLog->CreLog_Password = $adminModal->Log_Password;
                $credentialLog->save();
                session()->flash('generated_password', $password);
                session()->flash('generated_username', $adminModal->Log_Username);
            }
            DB::commit();

            return redirect()->route('admin.empRegistration.create')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            // DB::rollBack();
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function update(Request $request, $id)
    {
       
        $user = EmpRegistration::find($id);

        try {
            $user->Emp_Reg_Id = getSelectedValue();
            if ($request->hasFile('Emp_Logo')) {
                $extension = strtolower($request->file('Emp_Logo')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Emp_Logo')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'EmployeeReg_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");
                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $extension = $request->file('Emp_Logo')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Emp_Logo
                        $request->file('Emp_Logo')->move($destinationPath, $fileName);
                        $user->Emp_Logo = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }
            $user->Emp_Role = $request->input('Emp_Role');
            $user->Emp_Name = $request->input('Emp_Name');
            $user->Emp_Contact = $request->input('Emp_Contact');
            if (Auth::user()->EmpRegistration->Emp_Role == '1') {
                $user->Emp_Email = $request->input('Emp_Email');
                $user->save();

                $adminModal = Login::where('Log_Emp_Id', $user->Emp_Id)->first();
                $credentialLog = CredentialLog::where('CreLog_Emp_Id', $user->Emp_Id)->first();

                if ($adminModal && $credentialLog) {
                    $adminModal->Log_Username = $user->Emp_Email;
                    $adminModal->save();

                    $credentialLog->CreLog_Username = $user->Emp_Email;
                    $credentialLog->save();
                }
            }
            $user->Emp_Address = $request->input('Emp_Address');
            $user->Emp_Remark = $request->input('Emp_Remark');
            $user->Emp_StartDate = $request->input('Emp_StartDate');
            $user->Emp_ExpiryPeriod = $request->input('Emp_ExpiryPeriod');
            $user->Emp_TwoStepVerification = $request->input('Emp_TwoStepVerification');
            $user->Emp_UpdatedBy = Auth::user()->Log_Id;
            $user->Emp_UpdatedDate = Carbon::now('Asia/Kolkata');
            $user->save();

            return redirect()->route('admin.empRegistration.index')->with('success', 'User updated successfully.');
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
            DB::beginTransaction();

            $user = EmpRegistration::find($id);

            if (!$user) {
                return back()->with('error', 'Record not found');
            }

            $user->delete();

            $login = Login::where('Log_Emp_Id', $id)->first();

            if ($login) {
                $login->delete();
            }

            $credentialLog = CredentialLog::where('CreLog_Emp_Id', $id)->first();
            if ($credentialLog) {
                $credentialLog->delete();
            }

            DB::commit();
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function active($id)
    {
        try {
            $registration = EmpRegistration::findOrFail($id);
            $registration->update(['Emp_Status' => '1']);

            $login = Login::where('Log_Emp_Id', $id)->first();

            if ($login) {
                $login->update(['Log_Status' => '0']);
            }

            $credentialLog = CredentialLog::where('CreLog_Emp_Id', $id)->first();

            if ($credentialLog) {
                $credentialLog->update(['CreLog_Status' => '0']);
            }

            return redirect()->route('admin.empRegistration.index')->with('success', 'Emp Registration marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $registration = EmpRegistration::findOrFail($id);
            $registration->update(['Emp_Status' => '0']);

            // Update Log_Status in Login model
            $login = Login::where('Log_Emp_Id', $id)->first();

            if ($login) {
                $login->update(['Log_Status' => '1']);
            }

            // Update CreLog_Status in CredentialLog model
            $credentialLog = CredentialLog::where('CreLog_Emp_Id', $id)->first();

            if ($credentialLog) {
                $credentialLog->update(['CreLog_Status' => '1']);
            }

            return redirect()->route('admin.empRegistration.index')->with('success', 'Emp Registration marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        $user = EmpRegistration::findOrFail(Auth::user()->id);

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
