<?php

use App\Models\Login;
use App\Models\Page;
use App\Models\EmpRegistration;
$user = Auth::user();

$model = EmpRegistration::where('Emp_Role', '!=', '1')->where('Emp_Reg_Id', '!=', 1)->get();
$modelChangePass = Login::first();

$WebsiteHelpModel = Page::leftJoin('tbl_pagecategory', 'tbl_page.Pag_PagCat_Id', '=', 'tbl_pagecategory.PagCat_Id')
    ->where(['Pag_Reg_Id' => getSelectedValue()])
    ->where('tbl_pagecategory.PagCat_Name', 'WebsiteHelp')
    ->orderBy('tbl_page.Pag_SerialOrder', 'asc')
    ->count();

?>
<style>
    .select2-container--default .select2-search--dropdown .select2-search__field {
        margin-top: 20px !important;
        outline-offset: 0px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #9d94f4 !important;
        text-align: center;
    }

    .select2-container--default .select2-results>.select2-results__options {
        text-align: center !important;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        text-align: center;
    }
</style>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center " id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        @if ($user->Log_Id === 1)
            <div class="col-lg-3">
                <select class="form-control" id="mySelect" style="width: 100%;">
                    <option value="1">SUPERADMIN </option>
                    @foreach ($model as $value)
                        <option value="{{ $value->Emp_Reg_Id }}"
                            {{ Session::get('selectedValue') == $value->Emp_Reg_Id ? 'selected' : '' }}>
                            {{ $value->Emp_Name }} → {{ Session::get('selectedValue') }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif



        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-md"></i>
                </a>

            </li>

            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">

                        {{ Auth::user()->Log_Username }}
                        <i class="fa fa-chevron-down"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <div class="dropdown-item" href="">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">

                                    </div>
                                </div>
                                <div class="flex-grow-1">

                                    <span class="fw-medium d-block">{{ Auth::user()->Log_Username }}</span>
                                    @php
                                        $empRole = Auth::user()->EmpRegistration->Emp_Role;
                                    @endphp

                                    <small class="text-muted">
                                        @if ($empRole == 1)
                                            SUPERADMIN
                                        @elseif($empRole == 2)
                                            ADMIN
                                        @elseif($empRole == 3)
                                            EMPLOYEE
                                        @else
                                            Unknown Role
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::to('/admin/profile') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.login.edit', encodeId($modelChangePass->Log_Id)) }}">
                            <i class="ti ti-key me-2 ti-sm"></i>
                            <span class="align-middle">Change password</span>
                        </a>
                    </li>
                    @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                        <li>
                            <a class="dropdown-item" href="{{ URL::to('/admin/settings') }}">
                                <i class="ti ti-settings me-2 ti-sm"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                    @endif
                    @if ($WebsiteHelpModel > 0)
                        <li>
                            <a class="dropdown-item" href="{{ URL::to('/admin/websiteHelp') }}">
                                <i class="ti ti-help me-2 ti-sm"></i>
                                <span class="align-middle">Website Help</span>
                            </a>
                        </li>
                    @endif
                    <!-- <li>
                         <a class="dropdown-item" href="pages-account-settings-billing.html">
                             <span class="d-flex align-items-center align-middle">
                                 <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                 <span class="flex-grow-1 align-middle">Billing</span>
                                 <span
                                     class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                             </span>
                         </a>
                     </li> -->
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <!-- <li>
                         <a class="dropdown-item" href="pages-faq.html">
                             <i class="ti ti-help me-2 ti-sm"></i>
                             <span class="align-middle">FAQ</span>
                         </a>
                     </li> -->
                    <!-- <li>
                         <a class="dropdown-item" href="pages-pricing.html">
                             <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                             <span class="align-middle">Pricing</span>
                         </a>
                     </li> -->
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <!-- <a class="dropdown-item" href="{{ URL::to('/admin_login/logout') }}">   -----OLD----- -->
                        <a class="dropdown-item" href="{{ URL::to('logout') }}">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                    <!-- <li>
                         <a class="dropdown-item" href="{{ URL::to('/admin/change_password') }}">
                             <i class="ti ti-logout me-2 ti-sm"></i>
                             <span class="align-middle"> Change Password</span>
                         </a>
                     </li> -->
                </ul>

            </li>
            <!--/ User -->
        </ul>

    </div>

</nav>
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#mySelect').on('change', function() {


            var selectedValue = $(this).val();

            $.ajax({
                type: 'POST',
                url: '/admin/set-session-variable',
                data: {
                    selectedValue: selectedValue,
                },
                success: function(response) {
                    window.location.reload();
                    console.log('Session variable set successfully.');
                },
                error: function(error) {
                    console.error('Error setting session variable:', error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#mySelect').select2();

        // Handle search functionality
        $('#mySelect').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search...');
            $('.select2-search__field').css('margin-bottom', '15px'); // Add this line
        });
    });
</script>
