@extends('backend.layouts.master')
@section('title', 'Create')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Social Links/</span> Add Social Links
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/social') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Social Links List
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.social.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Pag_Name">Social Media <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <select id="Pag_Name" name="Pag_Name" class="form-control"
                                            aria-describedby="name2">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Telegram">Telegram</option>
                                            <option value="YouTube">YouTube</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Linkedin">Linkedin</option>

                                        </select>
                                    </div>
                                    <span id="Pag_Name-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-6 form-group ">
                                    <label class="form-label" for="URL">URL <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="URL" name="Pag_URL" class="form-control"
                                            autocomplete="off" placeholder="Enter your URL" aria-describedby="name2" />
                                    </div>
                                    <span id="Pag_URL-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6">
                                        <label class="form-label" for="Icon">Icon <span
                                                style="color:red">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="Pag_Image" name="Pag_Image" class="form-control"
                                                autocomplete="off" placeholder="Enter your icon "
                                                aria-describedby="name2" />
                                        </div>
                                        <span id="Pag_Image-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif
                                 <div class="col-sm-6 form-group">
                                        <label class="form-label" for="Serial Order">Serial Order <span
                                                style="color:red">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="Pag_SerialOrder" name="Pag_SerialOrder"
                                                class="form-control" autocomplete="off"
                                                placeholder="Enter your ShortDesc" aria-describedby="name2"
                                                value="{{ $nextSerialOrder }}" />
                                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                    class="card-type"></span></span>
                                        </div>
                                        <span id="Pag_SerialOrder-error" class="error" style="color: red;"></span>
                                    </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mb-4" style='display: none;'>
                                    <label class="form-label" for="type"> SocialLink Category <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" id="Pag_PagCat_Id" name="Pag_PagCat_Id">
                                        @foreach ($model as $value)
                                            <option value="{{ $value->PagCat_Id }}"
                                                {{ $value->is_SocialLink ? 'selected' : '' }}>
                                                {{ $value->PagCat_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                            <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                            </button>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">

                                            <button type="button" class="btn btn-secondary" onclick="confirmReset()">
                                                <i class="fa fa-refresh fa-fw"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function($) {
            $("#register-form").validate({
                rules: {
                    Pag_Name: "required",
                    Pag_URL: "required",
                    Pag_ShortDesc: "required",
                    Pag_FullDesc: "required",
                    Pag_SerialOrder: "required"
                },
                messages: {
                    Pag_Name: "This field is required",
                    Pag_URL: "This field is required",
                    Pag_ShortDesc: "This field is required",
                    Pag_SerialOrder: "This field is required",
                    Pag_FullDesc: "This field is required"
                },
                errorPlacement: function(error, element) {
                    var fieldName = element.attr("name");
                    if (fieldName in fieldErrorMap) {
                        error.appendTo(fieldErrorMap[fieldName]);
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            var fieldErrorMap = {
                Pag_Name: "#Pag_Name-error",
                Pag_URL: "#Pag_URL-error",
                Pag_ShortDesc: "#Pag_ShortDesc-error",
                Pag_SerialOrder: "#Pag_SerialOrder-error",
                Pag_FullDesc: "#Pag_FullDesc-error"
            };
        });
    </script>
@endsection
