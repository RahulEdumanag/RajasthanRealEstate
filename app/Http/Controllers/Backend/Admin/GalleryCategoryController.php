<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryCategoryController extends Controller
{
    public function index(Request $request)
    {
        $model = GalleryCategory::get();
        return view('backend.admin.galleryCategory.index', compact('model'));
    }
    public function create()
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        return view('backend.admin.galleryCategory.create', compact('ImgMaxSizeModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new GalleryCategory();
            $useRegCliId = getSelectedValue();
            $model->GallCat_Reg_Id = $useRegCliId;
            $model->GallCat_Name = $request->GallCat_Name;

            $model->GallCat_FullDesc = $request->GallCat_FullDesc;

            $model->GallCat_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->GallCat_CreatedBy = Auth::user()->Log_Id;
            if ($request->hasFile('GallCat_Image')) {
                $extension = strtolower($request->file('GallCat_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('GallCat_Image')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'GalleryCategory_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('GallCat_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming GallCat_Image
                        $request->file('GallCat_Image')->move($destinationPath, $fileName);
                        $model->GallCat_Image = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }
            $model->GallCat_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.galleryCategory.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $GallCat_id = decodeId($hashedId);
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $model = GalleryCategory::where('GallCat_id', $GallCat_id)->first();

        return view('backend.admin.galleryCategory.edit', compact('model','ImgMaxSizeModel'));
    }
    public function update(Request $request, $GallCat_id)
    {
        try {
            $model = GalleryCategory::findOrFail($GallCat_id);
            $model->GallCat_Name = $request->GallCat_Name;

            $model->GallCat_FullDesc = $request->GallCat_FullDesc;
            $model->GallCat_UpdatedBy = Auth::user()->Log_Id;
            $model->GallCat_UpdatedDate = Carbon::now('Asia/Kolkata');

            $oldGallCat_Image = $model->GallCat_Image;
            if ($request->hasFile('GallCat_Image')) {
                $extension = strtolower($request->file('GallCat_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('GallCat_Image')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'GalleryCategory_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('GallCat_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming GallCat_Image
                        $request->file('GallCat_Image')->move($destinationPath, $fileName);
                        $model->GallCat_Image = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            // Delete old image files after saving the updated model
             deleteOldImages($oldGallCat_Image, $model->GallCat_Image); // Calling the helper function directly

            return redirect()->route('admin.galleryCategory.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
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
            $model = GalleryCategory::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            $imagePath = public_path("uploads/{$model->GallCat_Image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $model->delete();
            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $galleryCategory = GalleryCategory::findOrFail($id);
            $galleryCategory->update(['GallCat_Status' => '1']);
            return redirect()->route('admin.galleryCategory.index')->with('success', 'Gallery Category as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $galleryCategory = GalleryCategory::findOrFail($id);
            $galleryCategory->update(['GallCat_Status' => '0']);
            return redirect()->route('admin.galleryCategory.index')->with('success', 'Gallery Category as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
