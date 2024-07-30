@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <?php
    use App\Models\WebInfo;
    
    $WebName = WebInfo::where('tbl_website_information.WebInf_Reg_Id', '=', getSelectedValue())->where('WebInf_Status', '=', '0')->first();
    ?>

    <style>
        a {
            color: white;
        }

        a:hover {
            color: white;
        }

        .dashboard {
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            flex: 1;
            min-width: 280px;
            border-radius: 8px;
            padding: 20px;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .card .value {
            font-size: 32px;
            font-weight: bold;
        }

        .card .description {
            font-size: 14px;
        }

        .card.blue {
            background-color: #007bff;
        }

        .card.green {
            background-color: #28a745;
        }

        .card.orange {
            background-color: #fd7e14;
        }

        .card.red {
            background-color: #dc3545;
        }

        .card .stat-name {
            position: absolute;
            bottom: 10px;
            left: 20px;
            font-size: 12px;
            color: #ddd;
            font-family: cursive;
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
            }
        }
    </style>

    <div class="dashboard">
        <div class="card-container">

            @if (getSelectedValue() == 1 && Auth::user()->EmpRegistration->Emp_Role == '1')
                <div class="card blue">
                    <a href="{{ URL::to('/admin/registration') }}">
                        <i class="fas fa-users icon"></i>
                        <div class="value">{{ $RegistrationModel }}</div>
                        <div class="description">Total Registrations</div>
                        <hr>
                        <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                    </a>
                </div>

                <div class="card green">
                    <a href="{{ URL::to('/admin/empRegistration') }}">
                        <i class="fas fa-users icon"></i>
                        <div class="value">{{ $EmpRegistrationModel }}</div>
                        <div class="description">Total Employee Registrations</div>
                        <hr>

                        <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                    </a>
                </div>

                <div class="card orange">
                    <a href="{{ URL::to('/admin/webInfo') }}">
                        <i class="fas fa-info-circle icon"></i>
                        <div class="value">{{ $WebInfoModel }}</div>
                        <div class="description">Total Website Information</div>
                        <hr>

                        <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                    </a>
                </div>
            @endif

            @if ($contact > 0)
                <div class="card blue">
                    <a href="{{ URL::to('/admin/contact') }}">

                        <i class="fas fa-address-book icon"></i>
                        <div class="value">{{ $contact }}</div>
                        <div class="description">Total Contact Enquiries</div>
                        <hr>

                        <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                    </a>

                </div>
            @else
                <div class="card blue">
                    <a href="{{ URL::to('/admin/enquirie') }}">

                        <i class="fas fa-address-book icon"></i>
                        <div class="value">{{ $EnquirieContact }}</div>
                        <div class="description">Total Contact Enquiries</div>
                        <hr>

                        <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                    </a>

                </div>
            @endif

            <div class="card green">
                <i class="fas fa-user-plus icon"></i>
                <div class="value">{{ $UserVisitorCount }}</div>
                <div class="description">Total Website Visitors</div>
                <hr>

                <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
            </div>

            <div class="card orange">
                <a href="{{ URL::to('/admin/menu') }}">

                    <i class="fas fa-bars icon"></i>
                    <div class="value">{{ $MenuModel }}</div>
                    <div class="description">Total Menus</div>
                    <hr>

                    <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                </a>
            </div>

            <div class="card red">
                <a href="{{ URL::to('/admin/submenu') }}">
                    <i class="fas fa-list icon"></i>
                    <div class="value">{{ $SubMenuModel }}</div>
                    <div class="description">Total Sub Menus</div>
                    <hr>

                    <div class="stat-name">{{ $WebName->WebInf_Name ?? 'N/A' }}</div>
                </a>
            </div>

        </div>
    </div>

@endsection
