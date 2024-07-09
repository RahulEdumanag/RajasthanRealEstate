<?php
use Illuminate\Support\Facades\Session;
use App\Models\Enquirie;
use App\Models\Contact;
use App\Models\WebInfo;
use App\Models\Error;
use App\Models\AdminMenuAllotment;
use Illuminate\Support\Facades\Auth;
@include 'helpers';

$sessionId = Session::get('selectedValue');
$model = WebInfo::where('WebInf_Reg_Id', getSelectedValue())->orderBy('WebInf_CreatedDate', 'desc')->first();
$AdminMenuAllotmentModel = AdminMenuAllotment::with('adminMenu')
    ->where(['Add_MenAllo_Reg_Id' => getSelectedValue()])
    ->where('Add_MenAllo_Status', '=', 0)
    ->orderBy('Add_MenAllo_CreatedDate', 'asc')
    ->get();
$ErrorCount = Error::where('Error_Status', '=', '0')->where('Error_Status', '!=', '2')->count();
$ContactCount = Contact::where('Con_Reg_Id', getSelectedValue())->where('Con_Status', '!=', '2')->count();
$EnquirieCount = Enquirie::where('Enq_Reg_Id', getSelectedValue())->where('Enq_Status', '!=', '2')->count();

?>


<style>
    .error-icon {
        color: red;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ URL::to('/admin/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo"style="width: 100%;">
                <img src="{{ optional($model)->WebInf_HeaderLogo ? asset('uploads/' . $model->WebInf_HeaderLogo) : '' }}"
                    class="img-fluid" />

            </span> </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item @if (request()->is('admin/dashboard')) active @endif">
            <a href="{{ URL::to('/admin/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->EmpRegistration->Emp_Role == '1')
            <li class="menu-item active open" id="SUPERADMIN-SETTING">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-cog" style="font-size: 15px;"></i>
                    <div data-i18n="SUPERADMIN">SUPERADMIN</div>
                </a>
                <ul class="menu-sub">
                    <!-- <li class="menu-item @if (request()->is('admin/login*') && !request()->is('admin/adminMenuAllotment*')) active @endif">
                        <a href="{{ URL::to('/admin/login') }}" class="nav-link menu-link">
                            <div data-i18n="Logins">Logins</div>
                        </a>
                    </li>

                     <li class="menu-item">
                        <a href="{{ URL::to('/admin/clientMaster') }}"
                            class="nav-link  menu-link   @if (request()->is('admin/clientMaster')) active @endif">
                            <div data-i18n="ClientMaster">ClientMaster</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ URL::to('/admin/users') }}"
                            class="nav-link menu-link  @if (request()->is('admin/users')) active @endif">
                            <div data-i18n="All Users">All Users</div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{ URL::to('/admin/page') }}"
                            class="nav-link  menu-link   @if (request()->is('admin/page')) active @endif">
                            <div data-i18n="All Pages">All Pages</div>
                        </a>
                    </li> -->

                    <li class="menu-item @if (request()->is('admin/errorsView')) active @endif">
                        <a href="{{ URL::to('/admin/errorsView') }}" class="menu-link">
                            <!-- <i class="menu-icon fas fa-exclamation-triangle @if ($ErrorCount > 0) error-icon @endif"></i> -->
                            <div class="error-count"
                                data-i18n="Errors (<span style='color:{{ $ErrorCount > 0 ? 'red' : 'black' }};'>{{ $ErrorCount }}</span>)">
                                Errors (<span
                                    style="color:{{ $ErrorCount > 0 ? 'red' : 'black' }};">{{ $ErrorCount }}</span>)
                            </div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/imgsize*')) active @endif">
                        <a href="{{ URL::to('/admin/imgsize') }}" class="nav-link menu-link">
                            <div data-i18n=" Max Image Size"> Max Image Size</div>
                        </a>
                    </li>



                    <li class="menu-item @if (request()->is('admin/metaTags*')) active @endif">
                        <a href="{{ URL::to('/admin/metaTags') }}" class="nav-link menu-link">
                            <div data-i18n="Meta Tags">Meta Tags</div>
                        </a>
                    </li>



                    <li class="menu-item @if (request()->is('admin/adminMenu/create')) active @endif">
                        <a href="{{ URL::to('/admin/adminMenu/create') }}" class="nav-link menu-link">
                            <div data-i18n="Admin Menu">Admin Menu</div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/adminMenuAllotment*')) active @endif">
                        <a href="{{ URL::to('/admin/adminMenuAllotment') }}" class="nav-link menu-link">
                            <div data-i18n="Menu Allotment">Menu Allotment</div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/registration*')) active @endif">
                        <a href="{{ URL::to('/admin/registration') }}" class="nav-link menu-link">
                            <div data-i18n="Clients Registration">Clients Registration</div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/pageCategory*')) active @endif">
                        <a href="{{ URL::to('/admin/pageCategory') }}" class="nav-link menu-link">
                            <div data-i18n="Page Category">Page Category</div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/websiteHelp*')) active @endif">
                        <a href="{{ URL::to('/admin/websiteHelp') }}" class="nav-link menu-link">
                            <div data-i18n="Website Help">Website Help</div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/contactCategory/*')) active @endif">
                        <a href="{{ URL::to('/admin/contactCategory') }}" class="nav-link menu-link">
                            <div data-i18n="Contact Category">Contact Category</div>
                        </a>
                    </li>
                    <li class="menu-item @if (request()->is('admin/loginPower*')) active @endif">
                        <a href="{{ URL::to('/admin/loginPower') }}" class="nav-link menu-link">
                            <div data-i18n="Logins">Logins</div>
                        </a>
                    </li>

                    <li class="menu-item @if (request()->is('admin/expiryPeriod*')) active @endif">
                        <a href="{{ URL::to('/admin/expiryPeriod') }}" class="nav-link menu-link">
                            <div data-i18n="Expiry Period">Expiry Period</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif


        <li class="menu-item active open" id="ADMIN-SETTING">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fas fa-cog" style="font-size: 15px;"></i>
                <div data-i18n="ADMIN SETTING">ADMIN SETTING</div>
            </a>
            <ul class="menu-sub">



                @php
                    $webInfoCount = \App\Models\WebInfo::where('WebInf_Reg_Id', getSelectedValue())->count();
                @endphp

                @if ($webInfoCount == 0)
                    <li class="menu-item @if (request()->is('admin/webInfo*')) active @endif">
                        <a href="{{ URL::to('/admin/webInfo/create') }}" class="nav-link  menu-link ">
                            <div data-i18n="Website Info">Website Info</div>
                        </a>
                    </li>
                @else
                    <li class="menu-item @if (request()->is('admin/webInfo*')) active @endif">
                        <a href="{{ route('admin.webInfo.edit', encodeId($model->WebInf_Id)) }}"
                            class="nav-link menu-link">
                            <div data-i18n="Edit Website Info">Edit Website Info</div>
                        </a>
                    </li>
                @endif


                @foreach ($AdminMenuAllotmentModel as $value)
                    @php
                        $maxSerialOrderLength = \App\Models\AdminMenu::max(DB::raw('LENGTH(AddMen_SerialOrder)'));
                        $menuIds = explode(',', $value->Add_MenAllo_AddMen_Id);
                        $menuItems = \App\Models\AdminMenu::whereIn('AddMen_Id', $menuIds)
                            ->whereNotNull('AddMen_SerialOrder')
                            ->where('AddMen_Status', '=', '0')

                            ->orderByRaw("LPAD(AddMen_SerialOrder, $maxSerialOrderLength, 0) ASC")
                            ->get();

                    @endphp

                    @foreach ($menuItems as $menuItem)
                        <li class="menu-item @if (str_contains(request()->url(), 'admin/')) active @endif">

                            <a href="{{ route('admin.' . $menuItem->AddMen_URL . '.create') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                                <div data-i18n="{{ $menuItem->AddMen_Name }}">{{ $menuItem->AddMen_Name }}</div>
                            </a>
                        </li>
                    @endforeach
                @endforeach
                @if ($ContactCount > 0)
                    <li class="menu-item">
                        <a href="{{ URL::to('/admin/contact') }}"
                            class="nav-link  menu-link  @if (request()->is('admin/contact')) active @endif">
                            <div
                                data-i18n="Enquiries (<span style='color:{{ $ContactCount > 0 ? '#b00000' : 'black' }};'><b>{{ $ContactCount }}</b></span>)">
                                Enquiries{{ $ContactCount }} (<span
                                    style="color:{{ $ContactCount > 0 ? '#b00000' : 'black' }};">{{ $ContactCount }}</span>)
                            </div>
                        </a>
                    </li>
                @else
                    <li class="menu-item">
                        <a href="{{ URL::to('/admin/enquirie') }}"
                            class="nav-link  menu-link  @if (request()->is('admin/enquirie')) active @endif">
                            <div
                                data-i18n="Enquiries (<span style='color:{{ $EnquirieCount > 0 ? '#b00000' : 'black' }};'><b>{{ $EnquirieCount }}</b></span>)">
                                Enquiries2{{ $EnquirieCount }} (<span
                                    style="color:{{ $EnquirieCount > 0 ? '#b00000' : 'black' }};">{{ $EnquirieCount }}</span>)
                            </div>
                        </a>
                    </li>
                @endif

            </ul>
        </li>
    </ul>
</aside>

<!-- <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fas fa-cog" style="font-size: 15px;"></i>
                <div data-i18n="ADMIN SETTING">ADMIN SETTING</div>

            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ URL::to('/admin/empRegistration') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/empRegistration')) active @endif">
                        <div data-i18n="Employee Registration">Employee Registration</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/webInfo') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/webInfo')) active @endif">
                        <div data-i18n="Website Info">Website Info</div>
                    </a>
                </li>


                <li class="menu-item">
                    <a href="{{ URL::to('/admin/slider') }}"
                        class="nav-link  menu-link @if (request()->is('admin/slider')) active @endif">
                        <div data-i18n="Sliders">Sliders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/menu') }}"
                        class="nav-link  menu-link   @if (request()->is('admin/menu')) active @endif">
                        <div data-i18n="Menu">Menu</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/submenu') }}"
                        class="nav-link  menu-link   @if (request()->is('admin/submenu')) active @endif">
                        <div data-i18n="Sub Menu">Sub Menu</div>
                    </a>
                </li>
                 

                <li class="menu-item">
                    <a href="{{ URL::to('/admin/galleryCategory') }}"
                        class="nav-link  menu-link   @if (request()->is('admin/galleryCategory')) active @endif">
                        <div data-i18n="Gallery Category">Gallery Category</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ URL::to('/admin/gallery') }}"
                        class="nav-link  menu-link   @if (request()->is('admin/gallery')) active @endif">
                        <div data-i18n="Gallery">Gallery</div>
                    </a>
                </li>


                <li class="menu-item">
                    <a href="{{ URL::to('/admin/testimonial') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/testimonial')) active @endif">
                        <div data-i18n="Testimonials">Testimonials</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ URL::to('/admin/usefulLink') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/usefulLink')) active @endif">
                        <div data-i18n="Useful Links">Useful Links </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/social') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/social')) active @endif">
                        <div data-i18n="Social Links">Social Links</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/facility') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/facility')) active @endif">
                        <div data-i18n="Facilities">Facilities</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/event') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/event')) active @endif">
                        <div data-i18n="Events">Events</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ URL::to('/admin/package') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/package')) active @endif">
                        <div data-i18n="Packages">Packages--</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/service') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/service')) active @endif">
                        <div data-i18n="Services">Services</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/faq') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/faq')) active @endif">
                        <div data-i18n="FAQ’s">FAQ’s</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/announcement') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/announcement')) active @endif">
                        <div data-i18n="Announcement">Announcement</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/team') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/team')) active @endif">
                        <div data-i18n="Team">Team</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/contact') }}"
                        class="nav-link  menu-link  @if (request()->is('admin/contact')) active @endif">
                        <div data-i18n="Enquiries">Enquiries</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ URL::to('/admin/websiteHelp') }}"
                        class="nav-link  menu-link   @if (request()->is('admin/websiteHelp')) active @endif">
                        <div data-i18n="Website Help">Website Help</div>
                    </a>
                </li>
            </ul>
        </li> -->


<script>
    $(document).ready(function() {
        var currentUrl = "{{ url()->current() }}";
        $(".menu-item").removeClass("active open");


        if (currentUrl.includes('/admin/')) {
            $(".menu-item.admin-section").addClass("active open");
            $("#SUPERADMIN-SETTING").removeClass("open");
            $("#ADMIN-SETTING").addClass("open");
        } else {
            $("#SUPERADMIN-SETTING").addClass("open");
            $("#ADMIN-SETTING").removeClass("open");
        }

        // Highlight the active menu item
        $(".menu-item a").each(function() {
            var href = $(this).attr("href");

            // Check if the current URL contains the href
            if (currentUrl.includes(href)) {
                $(this).closest(".menu-item").addClass("active");
                $(this).parents(".menu-item").addClass("open");
            }
        });
    });
</script>
