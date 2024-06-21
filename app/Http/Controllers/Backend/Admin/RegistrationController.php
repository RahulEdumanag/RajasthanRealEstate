<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Models\Login;
use App\Models\CredentialLog;
use App\Models\EmpRegistration;
use App\Models\Registration;
use App\Models\ExpiryPeriod;

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
class RegistrationController extends Controller
{
    public function index()
    {
        $adminuser = Registration::get();
        return view('backend.admin.registration.index', compact('adminuser'));
    }
    public function create()
    {
        return view('backend.admin.registration.create');
    }
    public function edit($hashedId)
    {
        $Reg_Id = decodeId($hashedId);
        $user = Registration::where('Reg_Id', $Reg_Id)->first();
        return view('backend.admin.registration.edit', compact('user'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = new Registration();
            $user->Reg_Organization_Name = $request->input('Reg_Organization_Name');
            if ($request->hasFile('Reg_Logo')) {
                $extension = strtolower($request->file('Reg_Logo')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Reg_Logo')->isValid()) {
                        $subfolderName = getSelectedValue();

                        $folderName = 'Registration_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('Reg_Logo')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Reg_Logo
                        $request->file('Reg_Logo')->move($destinationPath, $fileName);
                        $user->Reg_Logo = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $user->Reg_Name = $request->input('Reg_Name');
            $user->Reg_Contact = $request->input('Reg_Contact');
            $user->Reg_Email = $request->input('Reg_Email');
            $user->Reg_Address = $request->input('Reg_Address');
            $user->Reg_Amount = $request->input('Reg_Amount');
            $user->Reg_Remark = $request->input('Reg_Remark');
            // $user->Reg_StartDate = $request->input('Reg_StartDate');
            // $user->Reg_ExpiryPeriod = $request->input('Reg_ExpiryPeriod');
            $user->Reg_TwoStepVerification = $request->input('Reg_TwoStepVerification');
            $user->Reg_CreatedBy = Auth::user()->Log_Id;
            $user->Reg_CreatedDate = Carbon::now('Asia/Kolkata');

            $user->save();
            if ($user->Reg_Id) {
                $EmpReg = new EmpRegistration();
                $EmpReg->Emp_Reg_Id = $user->Reg_Id;
                $EmpReg->Emp_Organization_Name = $user->Reg_Organization_Name;
                $EmpReg->Emp_Logo = $user->Reg_Logo;
                $EmpReg->Emp_Name = $user->Reg_Name;
                $EmpReg->Emp_Contact = $user->Reg_Contact;
                $EmpReg->Emp_Email = $user->Reg_Email;
                $EmpReg->Emp_Address = $user->Reg_Address;
                $EmpReg->Emp_Remark = $user->Reg_Remark;
                // $EmpReg->Emp_StartDate = $user->Reg_StartDate;
                // $EmpReg->Emp_ExpiryPeriod = $user->Reg_ExpiryPeriod;
                $EmpReg->Emp_TwoStepVerification = $user->Reg_TwoStepVerification;
                $EmpReg->Emp_CreatedBy = Auth::user()->Log_Id;
                $EmpReg->Emp_CreatedDate = Carbon::now('Asia/Kolkata');
                $EmpReg->save();

                $adminModal = new Login();
                $adminModal->Log_Emp_Id = $EmpReg->Emp_Id;
                $adminModal->Log_Reg_Id = $user->Reg_Id;
                $adminModal->Log_CreatedDate = Carbon::now('Asia/Kolkata');

                $adminModal->Log_CreatedBy = Auth()->user()->Log_Id;
                $adminModal->Log_Username = $EmpReg->Emp_Email;
                $password = generateNumericPassword();
                $adminModal->Log_Password = Hash::make($password);
                $adminModal->save();

                // Create CredentialLog entry
                $credentialLog = new CredentialLog();
                $credentialLog->CreLog_Reg_Id = $user->Reg_Id;
                $credentialLog->CreLog_Emp_Id = $EmpReg->Emp_Id;
                $credentialLog->CreLog_CreatedDate = Carbon::now('Asia/Kolkata');

                $credentialLog->CreLog_CreatedBy = Auth()->user()->Log_Id;
                $credentialLog->CreLog_Username = $EmpReg->Emp_Email;
                $credentialLog->CreLog_Password = $adminModal->Log_Password;
                $credentialLog->save();

                $ExpiryPeriodModal = new ExpiryPeriod();
                $ExpiryPeriodModal->ExpPer_Reg_Id = $user->Reg_Id;
                $ExpiryPeriodModal->ExpPer_StartDate = $user->Reg_CreatedDate;
                $ExpiryPeriodModal->ExpPer_EndDate = Carbon::parse($user->Reg_CreatedDate)->addDays(365);
                $ExpiryPeriodModal->ExpPer_Amount = $user->Reg_Amount;
                $ExpiryPeriodModal->ExpPer_Remark = $user->Reg_Remark;
                $ExpiryPeriodModal->ExpPer_CreatedDate = Carbon::now('Asia/Kolkata');
                $ExpiryPeriodModal->ExpPer_CreatedBy = Auth::user()->Log_Id;
                $ExpiryPeriodModal->save();

                session()->flash('generated_password', $password);
                session()->flash('generated_username', $adminModal->Log_Username);
            }
            DB::commit();

            return redirect()->route('admin.registration.create')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $user = Registration::find($id);

        try {
            $user->Reg_Organization_Name = $request->input('Reg_Organization_Name');

            $oldReg_Logo = $user->Reg_Logo;
            if ($request->hasFile('Reg_Logo')) {
                $extension = strtolower($request->file('Reg_Logo')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Reg_Logo')->isValid()) {
                        $subfolderName = getSelectedValue();

                        $folderName = 'Registration_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('Reg_Logo')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Reg_Logo
                        $request->file('Reg_Logo')->move($destinationPath, $fileName);
                        $user->Reg_Logo = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }
            $user->Reg_Name = $request->input('Reg_Name');
            $user->Reg_Contact = $request->input('Reg_Contact');
            $user->Reg_Amount = $request->input('Reg_Amount');

            if (Auth::user()->EmpRegistration->Emp_Role == '1') {
                $user->Reg_Email = $request->input('Reg_Email');

                $EmpReg = EmpRegistration::where('Emp_Reg_Id', $user->Reg_Id)->first();
                $EmpReg->Emp_Email = $request->input('Reg_Email');
                $EmpReg->save();

                // Update Emp_Email in Login
                $adminModal = Login::where('Log_Emp_Id', $EmpReg->Emp_Id)->first();
                if ($adminModal) {
                    $adminModal->Log_Username = $request->input('Reg_Email');
                    $adminModal->save();
                }

                // Update CreLog_Username in CredentialLog
                $credentialLog = CredentialLog::where('CreLog_Emp_Id', $EmpReg->Emp_Id)->first();
                if ($credentialLog) {
                    $credentialLog->CreLog_Username = $request->input('Reg_Email');
                    $credentialLog->save();
                }
            }
            $user->Reg_Address = $request->input('Reg_Address');
            $user->Reg_Remark = $request->input('Reg_Remark');
            // $user->Reg_StartDate = $request->input('Reg_StartDate');
            // $user->Reg_ExpiryPeriod = $request->input('Reg_ExpiryPeriod');
            $user->Reg_TwoStepVerification = $request->input('Reg_TwoStepVerification');
            $user->Reg_UpdatedBy = Auth::user()->Log_Id;
            $user->Reg_UpdatedDate = Carbon::now('Asia/Kolkata');

            
            $ExpiryPeriodModal = ExpiryPeriod::where('ExpPer_Reg_Id', $user->Reg_Id)->first();
            if ($ExpiryPeriodModal) {
                // Debugging statements
                $ExpiryPeriodModal->ExpPer_Amount = $user->Reg_Amount;
                $ExpiryPeriodModal->ExpPer_Remark = $user->Reg_Remark;
                $ExpiryPeriodModal->save();
            }

            $user->save();
            deleteOldImages($oldReg_Logo, $user->Reg_Logo); // Calling the helper function directly

            return redirect()->route('admin.registration.index')->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    private function deleteOldImages($oldPath, $newPath)
    {
        if ($oldPath && $oldPath !== $newPath) {
            $oldImagePath = public_path("uploads/{$oldPath}");
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $user = Registration::find($id);

            if (!$user) {
                return back()->with('error', 'Record not found');
            }
            $imagePath = public_path("uploads/{$user->Reg_Logo}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $user->delete();

            $EmpRegistration = EmpRegistration::where('Emp_Reg_Id', $id)->first();
            if ($EmpRegistration) {
                $EmpRegistration->delete();
            }

            $credentialLog = CredentialLog::where('CreLog_Reg_Id', $id)->first();
            if ($credentialLog) {
                $credentialLog->delete();
            }

            $login = Login::where('Log_Reg_Id', $id)->first();

            if ($login) {
                $login->delete();
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
            $registration = Registration::findOrFail($id);
            $registration->update(['Reg_Status' => '1']);

            // Update Log_Status in Login model
            $login = Login::where('Log_Reg_Id', $id)->first();

            if ($login) {
                $login->update(['Log_Status' => '0']);
            }

            // Update CreLog_Status in CredentialLog model
            $credentialLog = CredentialLog::where('CreLog_Emp_Id', $id)->first();

            if ($credentialLog) {
                $credentialLog->update(['CreLog_Status' => '0']);
            }

            return redirect()->route('admin.registration.index')->with('success', 'Registration marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $registration = Registration::findOrFail($id);
            $registration->update(['Reg_Status' => '0']);

            // Update Log_Status in Login model
            $login = Login::where('Log_Reg_Id', $id)->first();

            if ($login) {
                $login->update(['Log_Status' => '1']);
            }

            // Update CreLog_Status in CredentialLog model
            $credentialLog = CredentialLog::where('CreLog_Emp_Id', $id)->first();

            if ($credentialLog) {
                $credentialLog->update(['CreLog_Status' => '1']);
            }

            return redirect()->route('admin.registration.index')->with('success', 'Registration marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        $user = Registration::findOrFail(Auth::user()->id);

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
