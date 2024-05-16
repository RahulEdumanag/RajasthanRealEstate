<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
    public function index(Request $request)
    {
        $model = Menu::where('Men_Status', '!=', 2)
            ->where(['Men_Reg_Id' => getSelectedValue()])
            ->orderBy('Men_SerialOrder', 'asc')
            ->get();

        return view('backend.admin.menu.index', compact('model'));
    }

    public function create()
    {
        $menCliId = getSelectedValue();
        $nextSerialOrder = Menu::getNextSerialOrder($menCliId);
        $model = Menu::where('Men_Status', '!=', 2)
        ->where(['Men_Reg_Id' => getSelectedValue()])
        ->orderBy('Men_SerialOrder', 'asc')
        ->get();
        return view('backend.admin.menu.create', compact('nextSerialOrder','model'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Menu();
            $useRegCliId = getSelectedValue();
            $model->Men_Reg_Id = $useRegCliId;
            $model->Men_Name = $request->Men_Name;
            $model->Men_URL = $request->Men_URL;
            $model->Men_SubMenuExists = $request->Men_SubMenuExists;
            $model->Men_AdminExists = $request->Men_AdminExists;
            $model->Men_ShortDesc = $request->Men_ShortDesc;
            $model->Men_FullDesc = $request->Men_FullDesc;
            $model->Men_SerialOrder = $request->Men_SerialOrder;
            $model->Men_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Men_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.menu.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $Men_id = decodeId($hashedId);
        $model = Menu::where('Men_id', $Men_id)->first();

        return view('backend.admin.menu.edit', compact('model'));
    }
    public function update(Request $request, $Men_id)
    {
        $request->validate([]);
        try {
            $model = Menu::findOrFail($Men_id);
            if (Auth::user()->EmpRegistration->Emp_Role == '1') {
                $model->Men_AdminExists = $request->Men_AdminExists;
                $model->Men_URL = $request->Men_URL;
            }
            // if ($model->Men_AdminExists == null && Auth::user()->EmpRegistration->Emp_Role == '1') {
            //     $model->Men_Name = $request->Men_Name;
            // }

            if ($model->Men_AdminExists == null || (Auth::user()->EmpRegistration->Emp_Role == '1' && $model->Men_AdminExists != null)) {
                $model->Men_Name = $request->Men_Name;
            }
            $model->Men_SubMenuExists = $request->Men_SubMenuExists;
            $model->Men_ShortDesc = $request->Men_ShortDesc;
            $model->Men_FullDesc = $request->Men_FullDesc;
            $model->Men_SerialOrder = $request->Men_SerialOrder;
            $model->Men_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Men_UpdatedBy = Auth::user()->Log_Id;
            foreach (['Men_FooterLogo', 'Men_Logo', 'Men_Favicon'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);

                    if ($file->isValid()) {
                        // Get subfolder name from environment variable
                        $subfolderName = getSelectedValue();

                        // Create Menu_images folder if it doesn't exist
                        $folderName = 'Menu_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0755, true);
                        }

                        // Move the uploaded file to the Menu_images folder
                        $extension = $file->getClientOriginalExtension();
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);

                        // Remove old file if it exists
                        if (!empty($model->$imageField)) {
                            $oldFilePath = public_path("uploads/{$subfolderName}/{$folderName}") . '/' . $model->$imageField;
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }

                        // Set the model's field with the file name including subfolder and folder names
                        $model->$imageField = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            return redirect()->route('admin.menu.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = Menu::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            foreach (['Men_FooterLogo', 'Men_Logo', 'Men_Favicon'] as $imageField) {
                $fileToDelete = $model->$imageField;

                if (!empty($fileToDelete)) {
                    $filePath = public_path('uploads') . '/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            $model->update(['Men_Status' => 2]);

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->update(['Men_Status' => '1']);
            return redirect()->route('admin.menu.index')->with('success', 'Menu marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->update(['Men_Status' => '0']);
            return redirect()->route('admin.menu.index')->with('success', 'Menu marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
