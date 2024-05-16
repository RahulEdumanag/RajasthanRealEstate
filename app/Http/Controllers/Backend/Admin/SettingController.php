<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\ImgSize;
// use App\Models\ProductCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{
    public function index(Request $request)
    {
        $model = Setting::with('imgsize')->where('Set_Status', '!=', 2)->where('Set_Reg_Id', getSelectedValue())->get();

        return view('backend.admin.settings.index', compact('model'));
    }

    public function create()
    {
        $ImgSizeModel = ImgSize::orderBy('Img_CreatedDate', 'asc')->where('Img_Status', '=', 0)->get();
        //  dd($ImgSizeModel);
        return view('backend.admin.settings.create', compact('ImgSizeModel'));
    }

    public function store(Request $request)
    {
        try {
            $model = new Setting();
            $model->Set_Reg_Id = getSelectedValue();
            $model->Set_Img_Id = $request->Set_Img_Id;
            $model->Set_Website = $request->Set_Website;
            $model->Set_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Set_CreatedBy = Auth::user()->Log_Id;
            $model->save();

            return redirect()->route('admin.settings.index')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($hashedId)
    {
        $Set_Id = decodeId($hashedId);
        $model = Setting::where('Set_Id', $Set_Id)->first();
        $ImgSizeModel = ImgSize::orderBy('Img_CreatedDate', 'asc')->where('Img_Status', '=', 0)->get();

        return view('backend.admin.settings.edit', compact('model', 'ImgSizeModel'));
    }

    public function update(Request $request, $Set_Id)
    {
        $request->validate([]);

        try {
            $model = Setting::findOrFail($Set_Id);
            $model->Set_Img_Id = $request->Set_Img_Id;
            $model->Set_Website = $request->Set_Website;
            $model->Set_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Set_UpdatedBy = Auth::user()->Log_Id;
            $model->save();

            return redirect()->route('admin.settings.index')->with('success', 'Updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $model = Setting::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Set_Img_Id}"), public_path("uploads/{$model->Set_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['Set_Status' => 2]);

            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $settings = Setting::findOrFail($id);
            $settings->update(['Set_Status' => '1']);
            return redirect()->route('admin.settings.index')->with('success', 'Setting marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $settings = Setting::findOrFail($id);
            $settings->update(['Set_Status' => '0']);
            return redirect()->route('admin.settings.index')->with('success', 'Setting marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function getNextSetialOrder()
    {
        $lastActiveClient = Setting::where('Set_Status', '!=', 2)->orderBy('Set_Order', 'desc')->first();
        $nextOrder = $lastActiveClient ? $lastActiveClient->Set_Order + 1 : 1;

        return $nextOrder;
    }
}
