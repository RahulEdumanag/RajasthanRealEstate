<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\ImgSize;
use App\Models\ProductCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ImgSizeController extends Controller
{
    public function index(Request $request)
    {
        $model = ImgSize::where('Img_Status', '!=', 2)->orderBy('Img_CreatedDate', 'desc')->get();

        return view('backend.admin.imgsize.index', compact('model'));
    }

    public function create()
    {
        
        return view('backend.admin.imgsize.create' );
    }

    public function store(Request $request)
    {
        try {
            $model = new ImgSize();

            $model->Img_Title = $request->Img_Title;
            $model->Img_Value = $request->Img_Value;
            $model->Img_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Img_CreatedBy = Auth::user()->Log_Id;

            $model->save(); //
            return redirect()->route('admin.imgsize.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    public function edit($hashedId)
    {
        $Img_Id = decodeId($hashedId);
        $model = ImgSize::where('Img_Id', $Img_Id)->first();

        return view('backend.admin.imgsize.edit', compact('model'));
    }

    public function update(Request $request, $Img_Id)
    {
        $request->validate([]);

        try {
            $model = ImgSize::findOrFail($Img_Id);
            $model->Img_Title = $request->Img_Title;
            $model->Img_Value = $request->Img_Value;
            $model->Img_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Img_UpdatedBy = Auth::user()->Log_Id;
            $model->save();
         
            return redirect()->route('admin.imgsize.create')->with('success', 'Data added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }





    public function active($id)
    {
        try {
            $imgsize = ImgSize::findOrFail($id);
            $imgsize->update(['Img_Status' => '1']);
            return redirect()->route('admin.imgsize.index')->with('success', 'ImgSize marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inactive($id)
    {
        try {
            $imgsize = ImgSize::findOrFail($id);
            $imgsize->update(['Img_Status' => '0']);
            return redirect()->route('admin.imgsize.index')->with('success', 'ImgSize marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $model = ImgSize::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }
            $imagePaths = [public_path("uploads/{$model->Set_Image}"), public_path("uploads/{$model->Set_InnerBanner}")];
            foreach ($imagePaths as $imagePath) {
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }
            $model->update(['Img_Status' => 2]);

            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
