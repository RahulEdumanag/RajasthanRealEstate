<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{PropertyType, City, Property, Page, SubMenu, Menu, Enquirie, Blog, Gallery, ContactCategory, Contact, GalleryCategory, WebInfo, VisitorCounter};
use Illuminate\Support\{Carbon, Facades\Artisan, Facades\Mail};
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use View;
use Stevebauman\Location\Facades\Location;
class HomeController extends Controller
{
    protected $clientId;
    public function __construct()
    {
        Artisan::call('config:clear');
        $this->clientId = env('WEB_ID');
    }
    protected function baseQuery()
    {
        return Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')
            ->where('tbl_page.Pag_Reg_Id', '=', $this->clientId)
            ->where('Pag_Status', '=', '0')
            ->orderBy('Pag_SerialOrder', 'asc');
    }
    protected function getTestimonialModel()
    {
        return $this->baseQuery()->where('tbl_pagecategory.PagCat_Name', 'Testimonial')->get();
    }
    protected function getTestimonialModelHome()
    {
        return $this->baseQuery()->where('tbl_pagecategory.PagCat_Name', 'Testimonial')->take(6)->get();
    }
    protected function getServicesModel()
    {
        return $this->baseQuery()->where('tbl_pagecategory.PagCat_Name', 'Service')->take(4)->get();
    }
   
    public function about()
    {
        $TestimonialModel = $this->getTestimonialModel();
        $ServicesModel = $this->getServicesModel();
        $TeamModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Team')->take(3)->get();
        $AboutMenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $this->clientId)
            ->where('Men_Status', '=', '0')
            ->where('Men_URL', '=', 'about')
            ->orderBy('Men_SerialOrder', 'asc')
            ->first();
        // dd($AboutMenuModel);
        $WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
            ->where('tbl_website_information.WebInf_Reg_Id', '=', $this->clientId)
            ->where('WebInf_Status', '=', '0')
            ->first();
        $FacilityModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', '=', 'Facility')->take(4)->get();
        return view('frontend.about', compact('TestimonialModel', 'AboutMenuModel', 'ServicesModel', 'WebInfoModel', 'TeamModel', 'FacilityModel'));
    }
    public function showSubMenuDetails($type, $id)
    {
        $decryptedId = decodeId($id);
        $submenuModel = SubMenu::where('SubMen_Reg_Id', '=', $this->clientId)
            ->where('SubMen_Status', '=', '0')
            ->where('SubMen_Id', $decryptedId)
            ->firstOrFail();
        return view('frontend.showSubMenuDetails', compact('submenuModel', 'type'));
    }
    // Controller function
    public function view($hashedId)
    {
        $id = decodeId($hashedId);
        $usefulLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')
            ->orderBy('Pag_SerialOrder', 'asc')
            ->where('tbl_pagecategory.PagCat_Name', '=', 'UsefulLink')
            ->where('tbl_page.Pag_Reg_Id', '=', $this->clientId)
            ->where('Pag_Status', '=', '0')
            ->where('tbl_page.Pag_Id', '=', $id)
            ->first();
        return view('frontend.usefullLink', compact('usefulLinkModel'));
    }
    public function usefullLink($hashedId)
    {
        $id = decodeId($hashedId);
        $usefulLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')
            ->orderBy('Pag_SerialOrder', 'asc')
            ->where('tbl_pagecategory.PagCat_Name', '=', 'UsefulLink')
            ->where('tbl_page.Pag_Reg_Id', '=', $this->clientId)
            ->where('Pag_Status', '=', '0')
            ->where('tbl_page.Pag_Id', '=', $id)
            ->first();
        return view('frontend.usefullLink', compact('usefulLinkModel'));
    }
    public function subMenuDetail($id)
    {
        $subMenuDetailModel = SubMenu::where('tbl_submenu.SubMen_Reg_Id', '=', $this->clientId)
            ->orderBy('SubMen_SerialOrder', 'asc')
            ->where('SubMen_Status', '=', '0')
            ->findOrFail($id);
        return view('frontend.subMenuDetail', compact('subMenuDetailModel'));
    }
    public function contact()
    {
        $WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
            ->where('tbl_website_information.WebInf_Reg_Id', '=', $this->clientId)
            ->where('WebInf_Status', '=', '0')
            ->first();
        $ContactCategoryModel = ContactCategory::where('ConCat_Reg_Id', '=', $this->clientId)
            ->where('ConCat_Status', '=', 0)
            ->orderBy('ConCat_CreatedDate', 'desc')
            ->get();
        $SocialLinkModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Social')->get();
        // dd($ContactCategoryModel);
        return view('frontend.contact', compact('WebInfoModel', 'ContactCategoryModel', 'SocialLinkModel'));
    }
     
    public function Cstore(Request $request)
    {
        try {
            $model = new Contact();
            $model->Con_Reg_Id = $request->input('Con_Reg_Id', $this->clientId);
            $model->Con_PId = $request->Con_PId;
            $model->Con_Name = $request->Con_Name;
            $model->Con_Email = $request->Con_Email;
            $model->Con_Number = $request->Con_Number;
            $model->Con_Desc = $request->Con_Desc;
            $model->save();
            return back()->with('success', 'Message sent successfully.');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }
    public function service()
    {
        $TestimonialModel = $this->getTestimonialModel();
        $ServicesModel = $this->getServicesModelAbout();
        $ServiceMenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $this->clientId)
            ->where('Men_Status', '=', '0')
            ->where('Men_URL', '=', 'service')
            ->orderBy('Men_SerialOrder', 'asc')
            ->first();
        $WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
            ->where('tbl_website_information.WebInf_Reg_Id', '=', $this->clientId)
            ->where('WebInf_Status', '=', '0')
            ->first();
        $FacilityModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', '=', 'Facility')->get();
        return view('frontend.service', compact('ServicesModel', 'TestimonialModel', 'ServiceMenuModel', 'WebInfoModel', 'FacilityModel'));
    }
    public function serviceDetails($hashedId)
    {
        $FacilityModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', '=', 'Facility')->get();
        $PId = decodeId($hashedId);
        $ServiceDetails = Page::where('Pag_Id', $PId)
            ->where('Pag_Reg_Id', $this->clientId)
            ->where('Pag_Status', '=', '0')
            ->first();
        return view('frontend.serviceDetails ', compact('ServiceDetails', 'FacilityModel'));
    }
    public function propertyDetails($hashedId)
    {
        $categoryId = decodeId($hashedId);
        $propertyDetails = Property::where('PId', $categoryId)->with('propertyFeatures')->first();
        $WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
            ->where('tbl_website_information.WebInf_Reg_Id', '=', $this->clientId)
            ->where('WebInf_Status', '=', '0')
            ->first();
        $SocialLinkModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Social')->get();
        $SocialLinkModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')
            ->where('Pag_Reg_Id', '=', $this->clientId)
            ->where('Pag_Status', '=', '0')
            ->where('tbl_pagecategory.PagCat_Name', 'SocialLink')
            ->orderBy('Pag_SerialOrder', 'asc')
            ->get();
        $PropertyModel = Property::where('PReg_Id', '=', $this->clientId)
            ->where('PStatus', '=', '0')
            ->with('propertyType') // Eager load the propertyType relationship
            ->get();
        //    dd($SocialLinkModel);
        return view('frontend.propertyDetails ', compact('propertyDetails', 'WebInfoModel', 'SocialLinkModel', 'PropertyModel'));
    }
    public function error()
    {
        return view('frontend.error');
    }
    public function testimonial()
    {
        $TestimonialModel = $this->getTestimonialModel();
        return view('frontend.testimonial', compact('TestimonialModel'));
    }
    public function faqs()
    {
        $FaqModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Faq')->orderBy('tbl_page.Pag_CreatedDate', 'desc')->get();

        return view('frontend.faqs',compact('FaqModel'));
    }
    public function underConstruction()
    {
        return view('frontend.underConstruction');
    }
    public function calculator()
    {
        return view('frontend.calculator');
    }
    public function property(Request $request)
    {
        $query = Property::where('PReg_Id', '=', $this->clientId)
            ->where('PStatus', '=', '0')
            ->with('propertyType');
        if ($request->filled('keyword')) {
            $query->where('PTitle', 'like', '%' . $request->keyword . '%');
        }
        if ($request->filled('location')) {
            $query->whereHas('cities', function ($q) use ($request) {
                $q->where('Cit_Id', 'like', '%' . $request->location . '%');
            });
        }
        if ($request->filled('property_type')) {
            $query->whereHas('propertyType', function ($q) use ($request) {
                $q->where('PTyp_Id', 'like', '%' . $request->property_type . '%');
            });
        }
        if ($request->filled('bedroom')) {
            $query->where('PBedRoom', $request->bedroom);
        }
        if ($request->filled('bathroom')) {
            $query->where('PBathRoom', $request->bathroom);
        }
        if ($request->filled('square_fit_min')) {
            $query->where('PSqureFeet', '>=', $request->square_fit_min);
        }
        if ($request->filled('square_fit_max')) {
            $query->where('PSqureFeet', '<=', $request->square_fit_max);
        }
        $PropertyModel = $query->paginate(15);
        $CityModel = City::where('Cit_Status', '=', 0)->get();
        $PropertyTypeModel = PropertyType::where('PTyp_Status', '=', 0)->get();
        return view('frontend.property', compact('PropertyTypeModel', 'CityModel', 'PropertyModel'));
    }
}
