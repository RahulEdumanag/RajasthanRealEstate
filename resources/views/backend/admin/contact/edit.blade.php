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
                                    <div class="col-sm-6">
                                        <label for="Name" class="form-label">Property Title</label>
                                        <input type="text" class="form-control" id="Con_PId" name="Con_PId"
                                            value="{{ optional($model->property)->PTitle }}" placeholder="" readonly>
                                    </div>
                                @endif

                                @if ($model->Con_ConCat_Id)
                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Contact Category</label>
                                    <input type="text" class="form-control" id="Con_Name" name="Con_Name"
                                        value="{{ $model->Con_ConCat_Id ?? 'N/A' }}" placeholder="" readonly>
                                </div>
                                @endif

                                <div class="col-sm-6">
                                    <label for="Name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="Con_Name" name="Con_Name"
                                        value="{{ old('Con_Name', $model->Con_Name) }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="Con_Email" name="Con_Email"
                                        value="{{ old('Con_Email', $model->Con_Email) }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Number" class="form-label">Number</label>
                                    <input type="text" class="form-control" id="Con_Number" name="Con_Number"
                                        value="{{ old('Con_Number', $model->Con_Number) }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Message" class="form-label">Message</label>
                                    <textarea class="form-control" id="Con_Desc" name="Con_Desc" placeholder="" readonly>{{ old('Con_Desc', $model->Con_Desc) }}</textarea>
                                </div>

                                @if ($model && $model->Con_ConCat_Id !== null)
                                    <div class="col-sm-6">
                                        <label for="Number" class="form-label">Career</label>
                                        <input type="text" class="form-control" id="Con_ConCat_Id" name="Con_ConCat_Id"
                                            placeholder="" readonly
                                            @if ($model->Con_ConCat_Id == 1) value="Internship"
            @elseif ($model->Con_ConCat_Id == 0) value="Become a Partner" @endif>
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
