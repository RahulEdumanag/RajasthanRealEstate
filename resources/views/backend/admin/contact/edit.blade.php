@extends('backend.layouts.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Contact/</span> View Contact
            </h5>
            <div class="page-title-actions">
                <a href="{{ url()->previous() }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Back to List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.contact.update', $model->Con_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                @if ($model->Con_PId)
                                    <div class="form-group col-lg-6 ">
                                        <label class="form-label">Property Type:</label>
                                       <p>  {{ $model->propertyType->PTyp_Name }}</p>
                                    </div>
                                @endif
                                @if ($model->Con_ConCat_Id)
                                    <div class="form-group col-lg-6">
                                        <label class="form-label">Contact Category:</label>
                                        <p> {{ $model->Con_ConCat_Id ?? 'N/A' }}</p>
                                    </div>
                                @endif
                                <div class="form-group col-lg-6">
                                    <label class="form-label">Name:</label>
                                    <p>{{ old('Con_Name', $model->Con_Name) }}</p>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label">Email:</label>
                                    <p>{{ old('Con_Email', $model->Con_Email) }}</p>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label">Number:</label>
                                    <p>{{ old('Con_Number', $model->Con_Number) }}</p>
                                </div>
                                @if ($model->Con_Number2)
                                    <div class="form-group col-lg-6 ">
                                        <label class="form-label">Whatsapp Number:</label>
                                       <p>{{ $model->Con_Number2 }}</p>
                                    </div>
                                @endif
                                @if ($model->Con_Date)
                                    <div class="form-group col-lg-6 ">
                                        <label class="form-label">Purchase Date:</label>
                                       <p>{{ $model->Con_Date }}</p>
                                    </div>
                                @endif

                                <div class="form-group col-lg-6">
                                    <label class="form-label">Message:</label>
                                    <p>{{ old('Con_Desc', $model->Con_Desc) }}</p>
                                </div>
                                @if ($model && $model->Con_ConCat_Id !== null)
                                    <!-- <div class="col-sm-6">
                                            <label for="Number" class="form-label">Career</label>
                                            <input type="text" class="form-control" id="Con_ConCat_Id" name="Con_ConCat_Id"
                                                placeholder="" readonly
                                                @if ($model->Con_ConCat_Id == 1) value="Internship"
                                                    @elseif ($model->Con_ConCat_Id == 0) value="Become a Partner" @endif>
                                        </div> -->
                                    <div class="form-group col-lg-6">
                                        <label class="form-label">Career:</label>
                                        <p>
                                            @if ($model->Con_ConCat_Id == 1)
                                                value="Internship"
                                            @elseif ($model->Con_ConCat_Id == 0)
                                                value="Become a Partner"
                                            @endif
                                        </p>
                                    </div>
                                @endif
                                <div class="col-sm-6">
                                    @if ($model->Con_Attachment)
                                        <label for="Con_Attachment" class="form-label">CV</label>
                                        <div>
                                            <a href="{{ asset('uploads/' . $model->Con_Attachment) }}"
                                                target="_blank">Download CV</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
