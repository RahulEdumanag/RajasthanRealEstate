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
                <span class="text-muted fw-light">Meta Tags/</span> Add Meta Tags
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/metaTags') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Meta Tags List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.metaTags.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">

                                <div class="col-sm-12 form-group">
                                    <label class="form-label" for="Met_Type"> Type <span style="color:red">*</span></label>
                                    <select class="form-control" id="Met_Type" name="Met_Type">
                                        <option  selected disabled>Select</option>
                                        <option value="1">Name</option>
                                        <option value="2">Property</option>
                                    </select>
                                    <span id="Met_Type-error" class="error" style="color: red;"></span>

                                </div>


                                <div class="col-sm-12">
                                    <label class="form-label" for="Keywords">Keywords <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Met_Keywords" name="Met_Keywords" class="form-control"
                                            autocomplete="off" placeholder="Enter your Keywords" aria-describedby="name2" />
                                    </div>
                                    <span id="Met_Keywords-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-label" for="Description">Description</label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Met_Description" name="Met_Description" class="form-control" autocomplete="off"
                                            placeholder="Enter your Description" aria-describedby="name2">
                                        </textarea>
                                    </div>
                                </div>
                                


                                <div class="form-group mt-3">
                                    <div class=" d-flex col-xl-6">
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                            <button type="submit" class="btn "
                                                style="background-color:#7367f0;color:white"
                                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span>
                                                Save
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

                    Met_Keywords: "required",
                    Met_Type: "required"


                },
                messages: {

                    Met_Keywords: "This field is required",
                    Met_Type: "This field is required"

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
                Met_Keywords: "#Met_Keywords-error",
                Met_Type: "#Met_Type-error"

            };
        });
    </script>
@endsection
