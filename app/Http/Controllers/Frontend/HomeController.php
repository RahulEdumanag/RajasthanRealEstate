<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\{Page, SubMenu, Menu, Enquirie, Blog, Gallery, ContactCategory, Contact, GalleryCategory, WebInfo, VisitorCounter};
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
    protected function getServicesModelAbout()
    {
        return $this->baseQuery()->where('tbl_pagecategory.PagCat_Name', 'Service')->get();
    }
    public function index(Request $request)
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $referer = $request->header('referer');
        $existingEntry = VisitorCounter::where('Vis_Reg_Id', $this->clientId)
            ->where('Vis_Ip', $ip)
            ->where('Vis_CreatedDate', '>=', Carbon::now()->subDay())
            ->first();
        if (!$existingEntry) {
            // Use an IP location package to get approximate location
            $location = Location::get($ip);
            $country = $location ? $location->countryName : null;
            $region = $location ? $location->regionName : null;
            $city = $location ? $location->cityName : null;
            VisitorCounter::create([
                'Vis_Reg_Id' => $this->clientId,
                'Vis_Ip' => $ip,
                'Vis_Country' => $country,
                'Vis_Region' => $region,
                'Vis_City' => $city,
                'Vis_CreatedDate' => now(),
            ]);
        }
        
        $FacilityModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', '=', 'Facility')->take(4)->get();
        $usefulLinkModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'UsefulLink')->orderBy('Pag_SerialOrder', 'desc')->get();
        $today = Carbon::now('Asia/Kolkata');
        $ServicesModel = $this->getServicesModel();
        $TestimonialModel = $this->getTestimonialModelHome();
        $SliderModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', '=', 'Slider')->get();
        // dd($SliderModel);
        $BlogModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Blog')->take(4)->get();
        $TeamModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Team')->get();
        // dd($TeamModel);
        $FaqModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', 'Faq')->orderBy('tbl_page.Pag_CreatedDate', 'desc')->take(3)->get();
        $EventModel = $this->baseQuery(new Page())->whereDate('tbl_page.Pag_Date', '>=', $today)->where('tbl_pagecategory.PagCat_Name', 'Event')->get();
        $GalleryModel = Gallery::join('tbl_gallerycategory', 'tbl_gallery.Gall_GallCat_Id', '=', 'tbl_gallerycategory.GallCat_Id')
            ->where('tbl_gallery.Gall_Reg_Id', '=', $this->clientId)
            ->where('Gall_Status', '=', '0')
            ->get();
        $HomeMenuModel = Menu::where('tbl_menu.Men_Reg_Id', '=', $this->clientId)
            ->where('Men_Status', '=', '0')
            ->where('Men_URL', '=', '/')
            ->orderBy('Men_SerialOrder', 'asc')
            ->first();
        // dd($HomeMenuModel->Men_ShortDesc);
        $WebInfoModel = WebInfo::orderBy('WebInf_CreatedDate', 'desc')
            ->where('tbl_website_information.WebInf_Reg_Id', '=', $this->clientId)
            ->where('WebInf_Status', '=', '0')
            ->first();
        $HoroscopeModel = $this->baseQuery(new Page())->where('tbl_pagecategory.PagCat_Name', '=', 'Horoscope')->get();
        // dd($HoroscopeModel);
        return View::make('frontend.index', compact('BlogModel', 'FacilityModel', 'SliderModel', 'HomeMenuModel', 'TeamModel', 'TestimonialModel', 'GalleryModel', 'WebInfoModel', 'TeamModel', 'FaqModel', 'ServicesModel', 'EventModel', 'usefulLinkModel', 'HoroscopeModel'));
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
        return view('frontend.contact', compact('WebInfoModel', 'ContactCategoryModel','SocialLinkModel'));
    }
    public function talk()
    {
        $ContactCategoryModel = ContactCategory::where('ConCat_Reg_Id', '=', $this->clientId)
            ->where('ConCat_Status', '=', 0)
            ->orderBy('ConCat_CreatedDate', 'desc')
            ->get();
        return view('frontend.talk', compact('ContactCategoryModel'));
    }
    public function booking()
    {
        $ContactCategoryModel = ContactCategory::where('ConCat_Reg_Id', '=', $this->clientId)
            ->where('ConCat_Status', '=', 0)
            ->orderBy('ConCat_CreatedDate', 'desc')
            ->get();
        return view('frontend.booking', compact('ContactCategoryModel'));
    }
    public function Cstore(Request $request)
    {
        try {
            $model = new Enquirie();
            $model->Enq_Reg_Id = $request->input('ConCat_Reg_Id', $this->clientId);
            $model->Enq_ConCat_Id = $request->Enq_ConCat_Id;
            // dd($model);
            $model->Enq_Name = $request->Enq_Name;
            $model->Enq_Number = $request->Enq_Number;
            $model->Enq_Email = $request->Enq_Email;
            $model->Enq_Dob = $request->Enq_Dob;
            $model->Enq_Birthplace = $request->Enq_Birthplace;
            $model->Enq_Time = $request->Enq_Time;
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
        $categoryId = decodeId($hashedId);
        $ServiceDetails = Page::where('Pag_Id', $categoryId)
            ->where('Pag_Reg_Id', $this->clientId)
            ->where('Pag_Status', '=', '0')
            ->first();
        return view('frontend.serviceDetails ', compact('ServiceDetails', 'FacilityModel'));
    }
    public function error()
    {
        return view('frontend.error');
    }
    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function faqs()
    {
        return view('frontend.faqs');
    }
    public function franchise()
    {
        $ContactCategoryModel = ContactCategory::where('ConCat_Reg_Id', '=', $this->clientId)
            ->where('ConCat_Status', '=', 0)
            ->orderBy('ConCat_CreatedDate', 'desc')
            ->get();
        return view('frontend.franchise', compact('ContactCategoryModel'));
    }
    public function underConstruction()
    {
        return view('frontend.underConstruction');
    }
    public function calculator()
    {
        return view('frontend.calculator');
    }
    public function property()
    {
        return view('frontend.property');
    }
}
