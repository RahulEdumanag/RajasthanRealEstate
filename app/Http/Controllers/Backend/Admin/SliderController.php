<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $model = Page::where('Pag_Status', '!=', 2)->where('Pag_Reg_Id', getSelectedValue())->with('category')->whereHas('category', fn($query) => $query->where('PagCat_Name', 'Slider'))->orderBy('Pag_SerialOrder', 'asc')->get();
        // \Log::info('Current order:', $model->pluck('Pag_SerialOrder')->toArray());
        return view('backend.admin.slider.index', compact('model'));
    }

    public function create()
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $nextSerialOrder = getNextSerialOrder(getSelectedValue(), 'Slider');
        $model = PageCategory::where('PagCat_Name', 'Slider')->where('PagCat_Status', '0')->where('PagCat_Status', '0')->orderBy('PagCat_Id', 'desc')->get();

        return view('backend.admin.slider.create', compact('nextSerialOrder', 'model','ImgMaxSizeModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Page();
            $useRegCliId = getSelectedValue();
            $model->Pag_Reg_Id = $useRegCliId;
            $model->Pag_PagCat_Id = $request->Pag_PagCat_Id;
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_URL = $request->Pag_URL;
            $model->Pag_AdminExists = $request->Pag_AdminExists;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Pag_CreatedBy = Auth::user()->Log_Id;
            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'Slider_images';
                        $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                        // Ensure the folder exists, create it if not
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $extension = $request->file('Pag_Image')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renaming Pag_Image
                        $request->file('Pag_Image')->move($destinationPath, $fileName);
                        $model->Pag_Image = "{$subfolderName}/{$folderName}/{$fileName}";
                    }
                }
            }

            $model->save();
            return redirect()->route('admin.slider.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function show(Page $rooms)
    {
        //
    }
    //old without decodeId
    // public function edit($Pag_id)
    // {
    //     $model = Page::where('Pag_id', $Pag_id)->first();

    //     return view('backend.admin.slider.edit', compact('model'));
    // }

    public function edit($hashedId)
    {
        try {
            $ImgMaxSizeModel = getImgMaxSizeModel();
            $Pag_id = decodeId($hashedId);

            $model = Page::where('Pag_id', $Pag_id)->first();
            return view('backend.admin.slider.edit', compact('model','ImgMaxSizeModel'));
        } catch (\Exception $e) {
            // Log or handle the exception
        }
    }

    public function update(Request $request, $Pag_id)
    {
        try {
            $model = Page::findOrFail($Pag_id);

            // if ($model->Pag_AdminExists == null && Auth::user()->EmpRegistration->Emp_Role == '1') {
            //     $model->Pag_Name = $request->Pag_Name;
            // }

            if ($model->Pag_AdminExists == null || (Auth::user()->EmpRegistration->Emp_Role == '1' && $model->Pag_AdminExists != null)) {
                $model->Pag_Name = $request->Pag_Name;
            }
            $model->Pag_URL = $request->Pag_URL;
            $model->Pag_AdminExists = $request->Pag_AdminExists;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_UpdatedBy = Auth::user()->Log_Id;
            $model->Pag_UpdatedDate = Carbon::now('Asia/Kolkata');
            $oldPag_Image = $model->Pag_Image;

            if ($request->hasFile('Pag_Image')) {
                if ($request->file('Pag_Image')->isValid()) {
                    $subfolderName = getSelectedValue();
                    $folderName = 'Slider_images';
                    $destinationPath = public_path("uploads/{$subfolderName}/{$folderName}");

                    // Ensure the folder exists, create it if not
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }

                    $extension = $request->file('Pag_Image')->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $request->file('Pag_Image')->move($destinationPath, $fileName);
                    $model->Pag_Image = "{$subfolderName}/{$folderName}/{$fileName}";
                } else {
                    return back()->withErrors(['Pag_Image' => 'The uploaded file is not valid.']);
                }
            }

            $model->save();
            // Delete old image files after saving the updated model
             deleteOldImages($oldPag_Image, $model->Pag_Image);  

            return redirect()->route('admin.slider.index')->with('success', ' Updated successfully.');
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
            $model = Page::find($id);

            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            // Check if the image field is not empty before attempting deletion
            if (!empty($model->Pag_Image)) {
                $imagePath = public_path("uploads/{$model->Pag_Image}");

                // Check if the file exists before attempting to delete it
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                } else {
                }
            }

            $model->update(['Pag_Status' => 2]);

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function active($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '1']);
            return redirect()->route('admin.slider.index')->with('success', 'Slider marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '0']);
            return redirect()->route('admin.slider.index')->with('success', 'Slider marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // WithOut helpers
    // public function updateOrder(Request $request)
    // {
    //     $order = $request->input('order');
    //     foreach ($order as $index => $itemId) {
    //         $item = Page::find($itemId);
    //         if ($item) {
    //             $item->Pag_SerialOrder = $index + 1;
    //             $item->save();
    //         } else {
    //             \Log::error("Item with ID $itemId not found during order update.");
    //         }
    //     }
    //     return response()->json(['success' => true]);
    // }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        updateSerialOrder($order);

        return response()->json(['success' => true]);
    }
}
