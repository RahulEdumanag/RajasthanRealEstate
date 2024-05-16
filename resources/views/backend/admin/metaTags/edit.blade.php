@extends('backend.layouts.master')
@section('title', 'Edit')

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Meta Tags/</span> Edit Meta Tags
            </h5>
            <div class="page-title-actions">
                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                    <a href="{{ URL::to('admin/metaTags') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Meta Tags List
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id='edit' action="{{ Route('admin.metaTags.update', $model->Met_Id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="Keywords" class="form-label">Keywords<span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Met_Keywords" name="Met_Keywords"
                                        value="{{ old('Met_Keywords', $model->Met_Keywords) }}" placeholder="">
                                    <span id="Met_Keywords-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12">
                                    <label for="Description" class="form-label">Description</label>
                                    <textarea class="form-control" id="Met_Description" name="Met_Description" placeholder="">{{ old('Met_Description', $model->Met_Description) }}</textarea>
                                </div>


                                <div class="col-sm-12">
                                    <label for="Og: Title" class="form-label">Og: Title</label>
                                    <input type="text" class="form-control" id="Met_OgTitle" name="Met_OgTitle"
                                        value="{{ old('Met_OgTitle', $model->Met_OgTitle) }}" placeholder="">
                                </div>
                                <div class="col-sm-12">
                                    <label for="Og: Description" class="form-label">Og: Description</label>
                                    <textarea class="form-control" id="Met_OgDescription" name="Met_OgDescription" placeholder="">{{ old('Met_OgDescription', $model->Met_OgDescription) }}</textarea>
                                </div>





                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn " style="background-color:#7367f0;color:white"
                                        data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                                    </button>
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
            $("#edit").validate({
                rules: {

                    Met_Keywords: "required"

                },
                messages: {

                    Met_Keywords: "This field is required"
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
                Met_Keywords: "#Met_Keywords-error"
            };
        });
    </script>

@stop
