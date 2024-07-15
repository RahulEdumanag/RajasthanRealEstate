<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\MetaTags;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MetaTagsController extends Controller
{
    public function index(Request $request)
    {
        $model = MetaTags::where('Met_Status', '!=', 2)
            ->where(['Met_Reg_Id' => getSelectedValue()])
            ->get();
        return view('backend.admin.metaTags.index', compact('model'));
    }

    public function create()
    {
        $model = MetaTags::where('Met_Status', '!=', 2)
            ->where(['Met_Reg_Id' => getSelectedValue()])
            ->get();
        return view('backend.admin.metaTags.create', compact('model'));
    }
    public function store(Request $request)
    {
        try {
            $model = new MetaTags();

            $model->Met_Reg_Id = getSelectedValue();
            $model->Met_Keywords = $request->Met_Keywords;
            $model->Met_Description = $request->Met_Description;
            $model->Met_OgTitle = $request->Met_OgTitle;
            $model->Met_OgDescription = $request->Met_OgDescription;
            $model->Met_CreatedDate = Carbon::now('Asia/Kolkata');
            $model->Met_CreatedBy = Auth::user()->Log_Id;
            $model->save();
            return redirect()->route('admin.metaTags.create')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function edit($hashedId)
    {
        $Met_id = decodeId($hashedId);
        $model = MetaTags::where('Met_id', $Met_id)->first();

        return view('backend.admin.metaTags.edit', compact('model'));
    }
    public function update(Request $request, $Met_id)
    {
        $request->validate([]);
        try {
            $model = MetaTags::findOrFail($Met_id);
            $model->Met_Keywords = $request->Met_Keywords;
            $model->Met_Description = $request->Met_Description;
            $model->Met_OgTitle = $request->Met_OgTitle;
            $model->Met_OgDescription = $request->Met_OgDescription;
            $model->Met_UpdatedDate = Carbon::now('Asia/Kolkata');
            $model->Met_UpdatedBy = Auth::user()->Log_Id;

            $model->save();
            return redirect()->route('admin.metaTags.index')->with('success', ' Updated successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $model = MetaTags::find($id);
            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            $model->update(['Met_Status' => 2]);

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $metaTags = MetaTags::findOrFail($id);
            $metaTags->update(['Met_Status' => '1']);
            return redirect()->route('admin.metaTags.index')->with('success', 'MetaTags marked as inactive.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function inactive($id)
    {
        try {
            $metaTags = MetaTags::findOrFail($id);
            $metaTags->update(['Met_Status' => '0']);
            return redirect()->route('admin.metaTags.index')->with('success', 'MetaTags marked as active.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
