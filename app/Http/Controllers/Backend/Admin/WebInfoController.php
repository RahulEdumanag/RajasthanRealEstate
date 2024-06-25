<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\WebInfo;
use App\Models\Master;
use App\Models\Registration;
use App\Models\Admin;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\AdminCredentials;
use Illuminate\Support\Facades\Mail;

class WebInfoController extends Controller
{
    public function index(Request $request)
    {
        if (getSelectedValue() == 1) {
            $model = WebInfo::where('WebInf_Status', '!=', 2)->where('WebInf_Id', '!=', 1)->orderBy('WebInf_CreatedDate', 'desc')->get();
        } else {
            $model = WebInfo::where('WebInf_Status', '!=', 2)->where('WebInf_Id', '!=', 1)->where('WebInf_Reg_Id', getSelectedValue())->orderBy('WebInf_CreatedDate', 'desc')->get();
        }

        return view('backend.admin.webInfo.index', compact('model'));
    }

    public function create()
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $adminuser = Registration::where('Reg_Id', '!=', 1)->whereNull('Reg_DeletedDate')->get();

        return view('backend.admin.webInfo.create', compact('adminuser','ImgMaxSizeModel'));
    }

    public function store(Request $request)
    {
        try {
            $model = new WebInfo();
            $model->WebInf_Reg_Id = getSelectedValue();
            $model->WebInf_Name = $request->WebInf_Name;
            $model->WebInf_Address = $request->WebInf_Address;
            $model->WebInf_Tagline = $request->WebInf_Tagline;
            $model->WebInf_EmailId = $request->WebInf_EmailId;
            $model->WebInf_ContactNo = $request->WebInf_ContactNo;
            $model->WebInf_Map = $request->WebInf_Map;
            $model->WebInf_ShortInfo1 = $request->WebInf_ShortInfo1;
            $model->WebInf_ShortInfo2 = $request->WebInf_ShortInfo2;
            $model->WebInf_ShortInfo3 = $request->WebInf_ShortInfo3;
            $model->WebInf_ShortInfo4 = $request->WebInf_ShortInfo4;
            $model->WebInf_About = $request->WebInf_About;
            $model->WebInf_openingHours = $request->WebInf_openingHours;
            $model->WebInf_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->WebInf_CreatedBy = Auth::user()->Log_Id;

            foreach (['WebInf_FooterLogo', 'WebInf_HeaderLogo', 'WebInf_Favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);

                    if ($file->isValid()) {
                        // Get subfolder name from environment variable
                        $subfolderName = getSelectedValue();

                        // Create WebInf folder if it doesn't exist
                        $folderName = 'WebInformation_images';
                        $webInfPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        if (!file_exists($webInfPath)) {
                            mkdir($webInfPath, 0755, true);
                        }

                        // Move the uploaded file to the WebInf folder
                        $destinationPath = $webInfPath;
                        $extension = $file->getClientOriginalExtension();
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);

                        // Set the model's field with the file name including subfolder and folder names
                        $model->$imageField = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();

            return redirect()->route('admin.webInfo.create')->with('success', 'Record added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $WebInf_Id = decodeId($hashedId);
        $model = WebInfo::where('WebInf_Id', $WebInf_Id)->first();
        return view('backend.admin.webInfo.edit', compact('model','ImgMaxSizeModel'));
    }

    public function update(Request $request, $WebInf_Id)
    {
        try {
            $model = WebInfo::findOrFail($WebInf_Id);
            $model->WebInf_Name = $request->WebInf_Name;
            $model->WebInf_Address = $request->WebInf_Address;
            $model->WebInf_Tagline = $request->WebInf_Tagline;
            $model->WebInf_EmailId = $request->WebInf_EmailId;
            $model->WebInf_ContactNo = $request->WebInf_ContactNo;
            $model->WebInf_Map = $request->WebInf_Map;
            $model->WebInf_ShortInfo1 = $request->WebInf_ShortInfo1;
            $model->WebInf_ShortInfo2 = $request->WebInf_ShortInfo2;
            $model->WebInf_ShortInfo3 = $request->WebInf_ShortInfo3;
            $model->WebInf_ShortInfo4 = $request->WebInf_ShortInfo4;
            $model->WebInf_About = $request->WebInf_About;
            $model->WebInf_openingHours = $request->WebInf_openingHours;
            $model->WebInf_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->WebInf_UpdatedBy = Auth::user()->Log_Id;

            $oldWebInf_FooterLogo = $model->WebInf_FooterLogo;
            $oldWebInf_HeaderLogo = $model->WebInf_HeaderLogo;
            $oldWebInf_Favicon = $model->WebInf_Favicon;
            $model->fill($request->except(['WebInf_FooterLogo', 'WebInf_HeaderLogo', 'WebInf_Favicon']));

            foreach (['WebInf_FooterLogo', 'WebInf_HeaderLogo', 'WebInf_Favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);

                    if ($file->isValid()) {
                        $subfolderName = getSelectedValue();

                        // Create WebInf folder if it doesn't exist
                        $folderName = 'WebInformation_images';
                        $webInfPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        if (!file_exists($webInfPath)) {
                            mkdir($webInfPath, 0755, true);
                        }

                        // Move the uploaded file to the WebInf folder
                        $destinationPath = $webInfPath;
                        $extension = $file->getClientOriginalExtension();
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);

                        // Set the model's field with the file name including subfolder and folder names
                        $model->$imageField = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            // Delete old image files after saving the updated model
             
            deleteOldImages($oldWebInf_FooterLogo, $model->WebInf_FooterLogo); // Calling the helper function directly
            deleteOldImages($oldWebInf_HeaderLogo, $model->WebInf_HeaderLogo); // Calling the helper function directly
            deleteOldImages($oldWebInf_Favicon, $model->WebInf_Favicon); // Calling the helper function directly

            return redirect()->route('admin.webInfo.index')->with('success', 'Record updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
 

    public function destroy($id)
    {
        try {
            $model = WebInfo::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            foreach (['WebInf_FooterLogo', 'WebInf_HeaderLogo', 'WebInf_Favicon'] as $imageField) {
                $fileToDelete = $model->$imageField;

                if (!empty($fileToDelete)) {
                    $filePath = public_path('uploads') . '/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            $model->update(['WebInf_Status' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $page = WebInfo::findOrFail($id);
            $page->update(['WebInf_Status' => '1']);
            return redirect()->route('admin.webInfo.index')->with('success', 'WebInfo marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $page = WebInfo::findOrFail($id);
            $page->update(['WebInf_Status' => '0']);
            return redirect()->route('admin.webInfo.index')->with('success', 'WebInfo marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
