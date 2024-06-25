<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategory;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    public function index(Request $request)
    {
        $model = Page::where('Pag_Status', '!=', 2)->where('Pag_Reg_Id', getSelectedValue())->with('category')->whereHas('category', fn($query) => $query->where('PagCat_Name', 'SocialLink'))->orderBy('Pag_SerialOrder', 'asc')->get();

        return view('backend.admin.social.index', compact('model'));
    }
    public function create()
    {
        $nextSerialOrder = getNextSerialOrder(getSelectedValue(), 'SocialLink');
        $model = PageCategory::where('PagCat_Name', 'SocialLink')->where('PagCat_Status', '0')->orderBy('PagCat_Id', 'desc')->get();
        return view('backend.admin.social.create', compact('nextSerialOrder', 'model'));
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
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_Image = $request->Pag_Image;
            $model->Pag_CreatedDate = Carbon::now('Asia/Kolkata');

            $model->Pag_CreatedBy = $useRegCliId;
            $model->save();
            return redirect()->route('admin.social.create')->with('success', 'Data added successfully.');
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

    public function edit($hashedId)
    {
        $Pag_id = decodeId($hashedId);
        $model = Page::where('Pag_id', $Pag_id)->first();
        return view('backend.admin.social.edit', compact('model'));
    }
    public function update(Request $request, $Pag_id)
    {
        $request->validate([]);
        try {
            $model = Page::findOrFail($Pag_id);
            if (Auth::user()->EmpRegistration->Emp_Role == '1') {
                $model->Pag_Image = $request->Pag_Image;
            }
            $model->Pag_Name = $request->Pag_Name;
            $model->Pag_URL = $request->Pag_URL;
            $model->Pag_ShortDesc = $request->Pag_ShortDesc;
            $model->Pag_FullDesc = $request->Pag_FullDesc;
            $model->Pag_SerialOrder = $request->Pag_SerialOrder;
            $model->Pag_UpdatedBy = Auth::user()->Log_Id;
            $model->Pag_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->save();
            return redirect()->route('admin.social.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = Page::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
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
            return redirect()->route('admin.social.index')->with('success', 'Social Link marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->update(['Pag_Status' => '0']);
            return redirect()->route('admin.social.index')->with('success', 'Social Link marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
