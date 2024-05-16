<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TeamController extends Controller
{
    public function index(Request $request)
    {

        $maxSerialOrderLength = \App\Models\Page::max(DB::raw('LENGTH(Pag_SerialOrder)'));

        $model = Page::where('Pag_Status', '!=', 2)->where('Pag_Reg_Id', getSelectedValue())->with('category')->whereHas('category', fn($query) => $query->where('PagCat_Name', 'Team'))
        ->orderByRaw("LPAD(Pag_SerialOrder, $maxSerialOrderLength, 0) ASC")->get(); 
 
        return view('backend.admin.team.index', compact('model'));
    }
    public function create()
    {
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $nextSerialOrder = getNextSerialOrder(getSelectedValue(), 'Team');
        $model = PageCategory::where('PagCat_Name', 'Team')->where('PagCat_Status', '0')->orderBy('PagCat_Id', 'desc')->get();

        return view('backend.admin.team.create', compact('model', 'nextSerialOrder','ImgMaxSizeModel'));
    }
    public function store(Request $request)
    {
        try {
            $model = new Page();
            $useRegCliId = getSelectedValue();
            $model->Pag_Reg_Id = $useRegCliId;
            $model->Pag_PagCat_Id = $request->Pag_PagCat_Id;
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;

            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'Team_images';
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

            $model->Pag_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Pag_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.team.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $Pag_id = decodeId($hashedId);
        $ImgMaxSizeModel = getImgMaxSizeModel();
        $model = Page::where('Pag_id', $Pag_id)->first();
        return view('backend.admin.team.edit', compact('model','ImgMaxSizeModel'));
    }
    public function update(Request $request, $Pag_id)
    {
        try {
            $model = Page::findOrFail($Pag_id);
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;

            $oldPag_Image = $model->Pag_Image;
            if ($request->hasFile('Pag_Image')) {
                $extension = strtolower($request->file('Pag_Image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('Pag_Image')->isValid()) {
                        $subfolderName = getSelectedValue();
                        $folderName = 'Team_images';
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

            $model->Pag_UpdatedBy = Auth::user()->Log_Id;
            $model->Pag_UpdatedDate = Carbon::now('Asia/Kolkata');

            $model->save();
             deleteOldImages($oldPag_Image, $model->Pag_Image); // Calling the helper function directly

            return redirect()->route('admin.team.index')->with('success', 'Updated successfully.');
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

            $imagePath = public_path("uploads/{$model->Pag_Image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Instead of delete, update Pag_Status to 2
            $model->update(['Pag_Status' => 2]);

            return back()->with('success', 'Record marked as deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '1']);

            return redirect()->route('admin.team.index')->with('success', 'Team as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '0']);

            return redirect()->route('admin.team.index')->with('success', 'Team as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
