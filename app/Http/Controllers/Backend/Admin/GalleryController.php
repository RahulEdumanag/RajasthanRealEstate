<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

use App\Models\GalleryCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $model = Gallery::where('Gall_Status', '!=', 2)
            ->where(['Gall_Reg_Id' => getSelectedValue()])
            ->get();
        return view('backend.admin.gallery.index', compact('model'));
    }

    public function create()
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $model = GalleryCategory::where('GallCat_Status', '!=', 2)
            ->where(['GallCat_Reg_Id' => getSelectedValue()])
            ->get();
        return view('backend.admin.gallery.create', compact('model','ImgMaxSizeModel'));
    }
    public function store(Request $request)
    {
        // Manual check for the number of uploaded files
        if ($request->hasFile('Gall_Image') && is_array($request->file('Gall_Image'))) {
            // Manual check for the number of uploaded files
            if (count($request->file('Gall_Image')) > 10) {
                return redirect()->back()->with('error', 'You can only upload a maximum of 10 images at once.');
            }
        }
        try {
            $model = new Gallery();
            $useRegCliId = getSelectedValue();
            $model->Gall_Reg_Id = $useRegCliId;
            $model->Gall_GallCat_Id = $request->Gall_GallCat_Id;
            // $model->Gall_Name = $request->Gall_Name;

            if ($request->hasFile('Gall_Image')) {
                $images = [];

                // Debug: Before the loop

                foreach ($request->file('Gall_Image') as $file) {
                    // Debug: Inside the loop

                    if ($file->isValid()) {
                        $extension = strtolower($file->getClientOriginalExtension());

                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                            // Debug: Inside the condition

                            $subfolderName = getSelectedValue();
                            $folderName = 'Gallery_images';
                            $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                            if (!file_exists($destinationPath)) {
                                mkdir($destinationPath, 0777, true);
                            }

                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $file->move($destinationPath, $fileName);
                            $images[] = "{$subfolderName}/{$folderName}/{$fileName}";
                        }
                    }
                }

                // Debug: After the loop

                // Convert the array to a comma-separated string
                $model->Gall_Image = implode(',', $images);
            } else {
                return redirect()->back()->with('error', 'No images uploaded.');
            }

            $model->Gall_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Gall_CreatedBy = Auth::user()->Log_Id;
            $model->save();

            return redirect()->route('admin.gallery.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            dd($e->getMessage());

            return back();
        }
    }

    public function edit($hashedId)
    {
        try {
            $ImgMaxSizeModel = getImgMaxSizeModel();
            $Gall_id = decodeId($hashedId);
            $gallery = Gallery::findOrFail($Gall_id);
            $galleryCategories = GalleryCategory::where(['GallCat_Reg_Id' => getSelectedValue()])->get();
            $model = Gallery::where(['Gall_Reg_Id' => getSelectedValue()])
                ->where('Gall_Id', $Gall_id)
                ->get();
            return view('backend.admin.gallery.edit', compact('gallery', 'galleryCategories', 'model','ImgMaxSizeModel'));
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            dd($e->getMessage());
            return back();
        }
    }
    public function update(Request $request, $Gall_id)
    {
        try {
            $model = Gallery::findOrFail($Gall_id);
            $existingPaths = explode(',', $model->Gall_Image);
            $uploadedPaths = [];
            $allPaths = $existingPaths;

            // Delete selected images
            if ($request->has('selectedImages')) {
                $selectedImages = $request->input('selectedImages');
                foreach ($selectedImages as $selectedImage) {
                    // Remove the selected image from the paths
                    $allPaths = array_diff($allPaths, [$selectedImage]);

                    // Delete the image file
                    $fullImagePath = public_path("uploads/{$selectedImage}");
                    if (is_file($fullImagePath) && file_exists($fullImagePath)) {
                        unlink($fullImagePath);
                    }
                }
            }

            $model->Gall_Image = implode(',', $allPaths);
            $model->Gall_UpdatedBy = Auth::user()->Log_Id;
            $model->Gall_UpdatedDate = now();
            $model->save();

            return redirect()->route('admin.gallery.index')->with('success', 'Updated successfully.');
        } catch (ValidationException $e) {
            // If validation fails, you can log the errors for debugging
            Log::error($e->errors());
            throw $e;
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $model = Gallery::find($id);

            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            $imagePaths = explode(',', $model->Gall_Image);

            foreach ($imagePaths as $imagePath) {
                $fullImagePath = public_path("uploads/{$imagePath}");

                if (is_file($fullImagePath)) {
                    unlink($fullImagePath);
                } else {
                    // Log a warning or handle the situation where the file doesn't exist
                    Log::warning("File not found: {$fullImagePath}");
                    // Alternatively, you can add an error message to the session
                    // back()->with('error', "File not found: {$fullImagePath}");
                }
            }

            $model->update(['Gall_Status' => 2]);

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function active($id)
    {
        try {
            $page = Gallery::findOrFail($id);
            $page->update(['Gall_Status' => '1']);

            return redirect()->route('admin.gallery.index')->with('success', 'Image marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Gallery::findOrFail($id);
            $page->update(['Gall_Status' => '0']);

            return redirect()->route('admin.gallery.index')->with('success', 'Image marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
