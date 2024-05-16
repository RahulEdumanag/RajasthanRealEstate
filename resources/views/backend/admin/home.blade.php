@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <?php
    
    use App\Models\WebInfo;
    use App\Models\SubMenu;
    
    $WebName = WebInfo::where('tbl_website_information.WebInf_Reg_Id', '=', getSelectedValue())->where('WebInf_Status', '=', '0')->first();
    
    ?>
    <style>
        .statistics {
            margin: 20px;
        }

        .statistics-grid a:hover .card {
            background-color: #bfbbeb;
            transition: background-color 0.3s ease-in-out;
        }

        .statistics-grid a:hover .card h3,
        .statistics-grid a:hover .card p {
            color: #fff;
            transition: color 0.3s ease-in-out;
        }

        .statistics-grid .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgb(0 0 0 / 19%);
            transition: box-shadow 0.3s ease-in-out;
            background-color: #ecf0f1;
        }

        .statistics-grid .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .statistics-grid h3 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .statistics-grid p {
            font-size: 18px;
            color: #7f8c8d;
        }

        .statistics-grid .number {
            font-size: 36px;
            color: #3498db;
        }

        .statistics-grid .fa {
            font-size: 48px;
            color: #3498db;
        }

        .statistics-grid .row {
            margin-top: 20px;
        }

        .statistics-grid .col-sm-6 {
            margin-bottom: 20px;
        }

        .card-list .card {
            border-radius: 8px;
            color: white;
            padding: 10px;
            position: relative;
            transition: box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out;

            .zmdi {
                color: white;
                font-size: 28px;
                opacity: 0.3;
                position: absolute;
                right: 13px;
                top: 13px;
            }

            .stat {
                border-top: 1px solid rgba(255, 255, 255, 0.3);
                font-size: 8px;
                margin-top: 25px;
                padding: 10px 10px 0;
                text-transform: uppercase;
                font-size: 12px;
                font-family: cursive;
            }

            .title {
                display: inline-block;
                font-size: 8px;
                padding: 10px 10px 0;
                text-transform: uppercase;
            }

            .value {
                font-size: 28px;
                padding: 0 10px;
                color: white;
            }

            &.blue {
                background-color: #2298F1;
            }

            &.green {
                background-color: #66B92E;
            }

            &.orange {
                background-color: #DA932C;
            }

            &.red {
                background-color: #D65B4A;
            }

            &:hover {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                background-color: #bfbbeb;
                color: #fff;
            }
        }
    </style>
    <div class="statistics">
        <div class="row">
            <?php
            $selectedValue = getSelectedValue();
            ?>

            @if ($selectedValue == 1)
                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                    <div class="col-xl-12 pr-xl-2 mb-5 ">
                        <div class="row">
                            <div class="col-sm-4 pr-sm-2 statistics-grid">
                                <a href="{{ URL::to('/admin/registration') }}">
                                    <div class="card card_border border-primary-top p-4">
                                        <h3 class="text-primary number"><i class="fas fa-users"></i> {{ $RegistrationModel }}
                                        </h3>
                                        <p class="stat-text">Total Registrations </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 pr-sm-2 statistics-grid">
                                <a href="{{ URL::to('/admin/empRegistration') }}">
                                    <div class="card card_border border-primary-top p-4">
                                        <h3 class="text-primary number"><i class="fas fa-users"></i>
                                            {{ $EmpRegistrationModel }}
                                        </h3>
                                        <p class="stat-text">Total Employee Registrations</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 pr-sm-2 statistics-grid">
                                <a href="{{ URL::to('/admin/webInfo') }}">
                                    <div class="card card_border border-primary-top p-4">
                                        <h3 class="text-primary number"><i class="fas fa-users"></i> {{ $WebInfoModel }}
                                        </h3>
                                        <p class="stat-text">Total Website Information</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <div class="card-list col-xl-12 pr-xl-2 mb-5">
                <div class="row ">
                @if ($contact > 0)
                    <div class="col-lg-6 col-sm-12 mt-5 ">
                        <div class="card blue">
                            <i class="fas fa-address-book"></i>
                            <a href="{{ URL::to('/admin/contact') }}">
                                <div class="value">{{ $contact }} <div class="stat-text">Total Contact Enquiries</div>
                                </div>
                            </a>
                            <div class="stat">{{ $WebName->WebInf_Name ?? 'N/A'}}</div>

                        </div>
                    </div>

                    @else
                    <div class="col-lg-6 col-sm-12 mt-5 ">
                        <div class="card blue">
                            <i class="fas fa-address-book"></i>
                            <a href="{{ URL::to('/admin/enquirie') }}">
                                <div class="value">{{ $EnquirieContact }} <div class="stat-text">Total Contact Enquiries</div>
                                </div>
                            </a>
                            <div class="stat">{{ $WebName->WebInf_Name ?? 'N/A'}}</div>

                        </div>
                    </div>
                    @endif

                    <div class="col-lg-6 col-sm-12 mt-5 ">
                        <div class="card green">
                            <i class="fas fa-user-plus"></i>
                         
                                <div class="value">{{ $UserVisitorCount }} <div class="stat-text">Total
                                        Website Visitor</div>
                                </div>
                           
                            <div class="stat">{{ $WebName->WebInf_Name ?? 'N/A'}}</div>


                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mt-5 ">
                        <div class="card orange">
                            <i class="fas fa-bars"></i>
                            <a href="{{ URL::to('/admin/menu') }}">
                                <div class="value"> {{ $MenuModel }} <div class="stat-text">Total Menus</div>
                                </div>
                            </a>
                            <div class="stat">{{ $WebName->WebInf_Name ?? 'N/A'}}</div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mt-5 ">
                        <div class="card red">
                            <i class="fas fa-list"></i>
                            <a href="{{ URL::to('/admin/submenu') }}">
                                <div class="value"> {{ $SubMenuModel }} <div class="stat-text">Total Sub Menus</div>
                                </div>
                            </a>
                            <div class="stat">{{ $WebName->WebInf_Name ?? 'N/A'}}</div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- old code -->
            <!--
                                                    <div class="col-xl-12 pr-xl-2 ">
                                                        <div class="row">
                                                            <div class="col-sm-6 pr-sm-2 statistics-grid">
                                                                <a href="{{ URL::to('/admin/contact') }}">
                                                                    <div class="card card_border border-primary-top p-4">
                                                                        <h3 class="text-primary number"><i class="fas fa-users"></i> {{ $contact }}</h3>
                                                                        <p class="stat-text">Total Contact Enquiries</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-6 pr-sm-2 statistics-grid">
                                                                <a href="{{ URL::to('/admin/empRegistration') }}">
                                                                    <div class="card card_border border-primary-top p-4">
                                                                        <h3 class="text-primary number"><i class="fas fa-quote-left"></i>
                                                                            {{ $UserEmpRegistrationModel }}</h3>
                                                                        <p class="stat-text">Total Employee Registrations</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 pl-xl-2 mt-5">
                                                        <div class="row">

                                                            <div class="col-sm-6 pr-sm-2 statistics-grid">
                                                                <a href="{{ URL::to('/admin/menu') }}">
                                                                    <div class="card card_border border-primary-top p-4">
                                                                        <h3 class="text-primary number"><i class="fas  fa-images"></i> {{ $MenuModel }}</h3>
                                                                        <p class="stat-text">Total Menus</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="col-sm-6 pr-sm-2 statistics-grid">
                                                                <a href="{{ URL::to('/admin/submenu') }}">
                                                                    <div class="card card_border border-primary-top p-4">
                                                                        <h3 class="text-primary number"><i class="fas fa-globe"></i> {{ $SubMenuModel }}</h3>
                                                                        <p class="stat-text">Total Sub Menus</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div> -->
        </div>
    </div>
@endsection
