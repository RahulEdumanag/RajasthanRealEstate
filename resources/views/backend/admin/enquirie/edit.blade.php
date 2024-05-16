@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Enquirie/</span> View Enquirie
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ route('admin.enquirie.update', $model->Enq_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="Enq_Name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="Enq_Name" name="Enq_Name"
                                        value="{{ $model->Enq_Name ?? 'N/A' }}" placeholder="Enter Name" readonly>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label for="Enq_Email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="Enq_Email" name="Enq_Email"
                                        value="{{ $model->Enq_Email ?? 'N/A' }}" placeholder="Enter Email" readonly>
                                </div> -->
                                <div class="col-md-6">
                                    <label for="Enq_Number" class="form-label">Number</label>
                                    <input type="text" class="form-control" id="Enq_Number" name="Enq_Number"
                                        value="{{ $model->Enq_Number ?? 'N/A' }}" placeholder="Enter Number" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="Enq_Dob" class="form-label">Date of Birth</label>
                                    <input type="text" class="form-control" id="Enq_Dob" name="Enq_Dob"
                                        value="{{ $model->Enq_Dob ?? 'N/A' }}" placeholder="Enter Date of Birth" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="Enq_Time" class="form-label">Birth Time</label>
                                    <input type="text" class="form-control" id="Enq_Time" name="Enq_Time"
                                        value="{{ $model->Enq_Time ?? 'N/A' }}" placeholder="Enter Birth Time" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="Enq_ConCat_Id" class="form-label">Problem</label>
                                    <input type="text" class="form-control" id="Enq_ConCat_Id" name="Enq_ConCat_Id"
                                        value="{{ $model->Enq_ConCat_Id }}" placeholder="Enter Problem" readonly>
                                </div>

                               

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
