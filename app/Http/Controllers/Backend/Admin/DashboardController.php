<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Contacts;
use App\Models\Registration;
use App\Models\EmpRegistration;
use App\Models\WebInfo;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\VisitorCounter;
use App\Models\Enquirie;

class DashboardController extends Controller
{
    public function index()
    {
        //display for SuperAdmin
        $RegistrationModel = Registration::where('Reg_Id', '!=', 1)->count();
        $EmpRegistrationModel = EmpRegistration::where('Emp_Id', '!=', 1)->count();
        $WebInfoModel = WebInfo::where('WebInf_Id', '!=', 1)->count();
        $visitorCount = VisitorCounter::count();

        //display for Admin
        $EnquirieContact = Enquirie::where('Enq_Reg_Id', getSelectedValue())->count();
         $contact = Contacts::where('Con_Reg_Id', getSelectedValue())->where('Con_Status', '!=', '2')->count();

        $MenuModel = Menu::where('Men_Reg_Id', getSelectedValue())->count();
        $SubMenuModel = SubMenu::where('SubMen_Reg_Id', getSelectedValue())->count();
        $UserEmpRegistrationModel = EmpRegistration::where('Emp_Id', '!=', 1)->where('Emp_Reg_Id', getSelectedValue())->count();
        $UserVisitorCount = VisitorCounter::where('Vis_Reg_Id', getSelectedValue())->count();
        return View::make('backend.admin.home', compact('contact', 'UserEmpRegistrationModel','EnquirieContact', 'MenuModel', 'SubMenuModel', 'RegistrationModel', 'EmpRegistrationModel', 'WebInfoModel','UserVisitorCount','visitorCount'));
    }
}
