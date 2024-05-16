@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <style>
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">My Profile /</span> View Profile
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">

                </div>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label"> Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                value="{{ Auth::user()->EmpRegistration->Emp_Name }}" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="User Name" class="form-label"> User Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                value="{{ Auth::user()->Log_Username }}" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="text" id="email" name="email"
                                value="{{ Auth::user()->EmpRegistration->Emp_Email }}" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="Status" class="form-label"> Status</label>
                            @php
                                $empRole = Auth::user()->EmpRegistration->Emp_Role;
                            @endphp
                            <input class="form-control" type="text" id="name" name="name"
                                value=" @if ($empRole == 1) SUPERADMIN
                                        @elseif($empRole == 2)ADMIN
                                        @elseif($empRole == 3)EMPLOYEE
                                        @elseUnknown Role @endif"
                                disabled />
                        </div>


                        <div class="mt-2">
                            <button type="button" onclick="window.location='{{ URL::to('/admin/dashboard') }}'"
                                class="btn btn-primary">
                                ← Go to Dashboard
                            </button>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection
