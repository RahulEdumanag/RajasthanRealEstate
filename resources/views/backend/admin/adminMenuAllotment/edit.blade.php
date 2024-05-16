@extends('backend.layouts.master')
@section('title', 'Edit')
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
                <span class="text-muted fw-light">Menu Allotment/</span> Edit Menu Allotment
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/adminMenuAllotment') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>Menu Allotment List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="edit-form" action="{{ route('admin.adminMenuAllotment.update', $models[0]->Add_MenAllo_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
                                    <label class="form-label" for="type">Admin Menu <span
                                            style="color:red">*</span></label>

                                    <div class="row">
                                    @foreach ($AdminModel as $value)
                                            <div class="col-3 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="Add_MenAllo_AddMen_Id[]"
                                                        id="Add_MenAllo_AddMen_Id_{{ $value->AddMen_Id }}"
                                                        value="{{ $value->AddMen_Id }}"
                                                        {{ in_array($value->AddMen_Id, $selectedAdminMenuIds[0]) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault">{{ $value->AddMen_Name }}</label><br>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <span id="Add_MenAllo_AddMen_Id-error" class="error" style="color: red;"></span>
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
            $("#edit-form").validate({
                rules: {
                    'Add_MenAllo_AddMen_Id[]': "required"
                },
                messages: {
                    'Add_MenAllo_AddMen_Id[]': "This field is required"
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
                'Add_MenAllo_AddMen_Id[]': "#Add_MenAllo_AddMen_Id-error"
            };
        });
    </script>
@endsection
