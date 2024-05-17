<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Property;
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
class PropertyController extends Controller
{
    public function index(Request $request)
    {
        if (getSelectedValue() == 1) {
            $model = Property::where('Pro_Status', '!=', 2)->where('Pro_Id', '!=', 1)->orderBy('Pro_CreatedDate', 'desc')->get();
        } else {
            $model = Property::where('Pro_Status', '!=', 2)->where('Pro_Id', '!=', 1)->where('Pro_Reg_Id', getSelectedValue())->orderBy('Pro_CreatedDate', 'desc')->get();
        }
        return view('backend.admin.property.index', compact('model'));
    }
    public function create()
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $adminuser = Registration::where('Reg_Id', '!=', 1)->whereNull('Reg_DeletedDate')->get();
        return view('backend.admin.property.create', compact('adminuser', 'ImgMaxSizeModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Property();
            $model->Pro_Reg_Id = getSelectedValue();
            $model->Pro_Name = $request->Pro_Name;
            $model->Pro_Address = $request->Pro_Address;
            $model->Pro_Tagline = $request->Pro_Tagline;
            $model->Pro_EmailId = $request->Pro_EmailId;
            $model->Pro_ContactNo = $request->Pro_ContactNo;
            $model->Pro_Map = $request->Pro_Map;
            $model->Pro_ShortInfo1 = $request->Pro_ShortInfo1;
            $model->Pro_ShortInfo2 = $request->Pro_ShortInfo2;
            $model->Pro_ShortInfo3 = $request->Pro_ShortInfo3;
            $model->Pro_ShortInfo4 = $request->Pro_ShortInfo4;
            $model->Pro_About = $request->Pro_About;
            $model->Pro_openingHours = $request->Pro_openingHours;
            $model->Pro_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Pro_CreatedBy = Auth::user()->Log_Id;
            foreach (['Pro_FooterLogo', 'Pro_HeaderLogo', 'Pro_Favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);
                    if ($file->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'Propert_images';
                        $webInfPath = public_path("uploads/{$subfolderName}/{$folderName}");
                        if (!file_exists($webInfPath)) {
                            mkdir($webInfPath, 0755, true);
                        }
                        $destinationPath = $webInfPath;
                        $extension = $file->getClientOriginalExtension();
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $model->$imageField = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }
            $model->save();
            return redirect()->route('admin.property.create')->with('success', 'Record added successfully.');
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
        $Pro_Id = decodeId($hashedId);
        $model = Property::where('Pro_Id', $Pro_Id)->first();
        return view('backend.admin.property.edit', compact('model', 'ImgMaxSizeModel'));
    }
    public function update(Request $request, $Pro_Id)
    {
        try {
            $model = Property::findOrFail($Pro_Id);
            $model->Pro_Name = $request->Pro_Name;
            $model->Pro_Address = $request->Pro_Address;
            $model->Pro_Tagline = $request->Pro_Tagline;
            $model->Pro_EmailId = $request->Pro_EmailId;
            $model->Pro_ContactNo = $request->Pro_ContactNo;
            $model->Pro_Map = $request->Pro_Map;
            $model->Pro_ShortInfo1 = $request->Pro_ShortInfo1;
            $model->Pro_ShortInfo2 = $request->Pro_ShortInfo2;
            $model->Pro_ShortInfo3 = $request->Pro_ShortInfo3;
            $model->Pro_ShortInfo4 = $request->Pro_ShortInfo4;
            $model->Pro_About = $request->Pro_About;
            $model->Pro_openingHours = $request->Pro_openingHours;
            $model->Pro_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Pro_UpdatedBy = Auth::user()->Log_Id;
            $oldPro_FooterLogo = $model->Pro_FooterLogo;
            $oldPro_HeaderLogo = $model->Pro_HeaderLogo;
            $oldPro_Favicon = $model->Pro_Favicon;
            $model->fill($request->except(['Pro_FooterLogo', 'Pro_HeaderLogo', 'Pro_Favicon']));
            foreach (['Pro_FooterLogo', 'Pro_HeaderLogo', 'Pro_Favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);
                    if ($file->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'Propertyrmation_images';
                        $webInfPath = public_path("uploads/{$subfolderName}/{$folderName}");
                        if (!file_exists($webInfPath)) {
                            mkdir($webInfPath, 0755, true);
                        }
                        $destinationPath = $webInfPath;
                        $extension = $file->getClientOriginalExtension();
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $model->$imageField = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }
            $model->save();
            deleteOldImages($oldPro_FooterLogo, $model->Pro_FooterLogo); 
            deleteOldImages($oldPro_HeaderLogo, $model->Pro_HeaderLogo); 
            deleteOldImages($oldPro_Favicon, $model->Pro_Favicon); 
            return redirect()->route('admin.property.index')->with('success', 'Record updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = Property::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            foreach (['Pro_FooterLogo', 'Pro_HeaderLogo', 'Pro_Favicon'] as $imageField) {
                $fileToDelete = $model->$imageField;
                if (!empty($fileToDelete)) {
                    $filePath = public_path('uploads') . '/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            $model->update(['Pro_Status' => 2]);
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $page = Property::findOrFail($id);
            $page->update(['Pro_Status' => '1']);
            return redirect()->route('admin.property.index')->with('success', 'Property marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Property::findOrFail($id);
            $page->update(['Pro_Status' => '0']);
            return redirect()->route('admin.property.index')->with('success', 'Property marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
