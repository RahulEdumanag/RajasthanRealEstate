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

    @if (Auth::user()->EmpRegistration->Emp_Role == '1')
    <div class="container-fluid">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Menu/</span> Add Menu
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/menu') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Menu List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="Name">Name <span style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="Men_Name" name="Men_Name" class="form-control"
                                            autocomplete="off" placeholder="Enter your Name" aria-describedby="name2" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Men_Name-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-6 form-group ">
                                        <label class="form-label" for="URL">URL  </label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="URL" name="Men_URL" class="form-control"
                                                autocomplete="off" placeholder="Enter your URL" aria-describedby="name2" />
                                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                    class="card-type"></span></span>
                                        </div>
                                     </div>
                                @endif
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Serial Order">Serial Order <span
                                            style="color:red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="Men_SerialOrder" name="Men_SerialOrder"
                                            class="form-control" autocomplete="off" placeholder="Enter your Serial Order"
                                            aria-describedby="name2" value="{{ $nextSerialOrder }}" />
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                    <span id="Men_SerialOrder-error" class="error" style="color: red;"></span>
                                </div>


                              
                                <div class="col-sm-6 form-group">
                                    <label class="form-label" for="Short Desc">Short Desc  </label>
                                    <div class="input-group input-group-merge">
                                        <textarea id="Men_ShortDesc" name="Men_ShortDesc" class="form-control" autocomplete="off"
                                            placeholder="Enter your ShortDesc" aria-describedby="name2"></textarea>
                                        <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                                class="card-type"></span></span>
                                    </div>
                                 </div>
                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="Full Desc">Full Desc</label>
                                    <textarea class="applyCK form-control" id="Men_FullDesc" name="Men_FullDesc" class="form-control"></textarea>
                                    <span id="Men_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
                                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                    <div class="col-sm-3 form-group">
                                        <label class="form-check-label" for="Admin Exists">Admin Exists</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="Men_AdminExists" name="Men_AdminExists"
                                                class="form-check-input">
                                        </div>
                                        <span id="Men_AdminExists-error" class="error" style="color: red;"></span>
                                    </div>
                                @endif
                                <div class="col-sm-3 form-group">
                                    <label class="form-check-label" for="Sub Menu Exists">Sub Menu Exists</label>
                                    <div class="form-check">
                                        <input type="checkbox" id="Men_SubMenuExists" name="Men_SubMenuExists"
                                            class="form-check-input">
                                    </div>
                                    <span id="Men_SubMenuExists-error" class="error" style="color: red;"></span>
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
    @else
    <div class="container-xxl flex-grow-1 container-p-y card">
        <div class="app-page-title">
            <div class="page-title-wrapper d-flex justify-content-between align-items-center">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Menu /</span> List
                    </h5>
                </div>

                 
            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Short Desc</th>
                            <th> Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>{{ $value->Men_Name }} </td>
                                <td>{{ $value->Men_ShortDesc }} </td>
                                <td> {{ $value->Men_SerialOrder }} </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.menu.edit', encodeId($value->Men_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>


                                    @if ($value->Men_AdminExists == 'on' && Auth::user()->EmpRegistration->Emp_Role == '1')
                                        <span class='me-2'>
                                            @if ($value->Men_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/menu/active', $value->Men_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Men_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/menu/inactive', $value->Men_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.menu.destroy', $value->Men_Id) }}" method="POST"
                                            id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @elseif($value->Men_AdminExists == null)
                                        <span class='me-2'>
                                            @if ($value->Men_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/menu/active', $value->Men_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Men_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/menu/inactive', $value->Men_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.menu.destroy', $value->Men_Id) }}" method="POST"
                                            id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class='me-2'>
                                            <button type="button" class="btn btn-warning">
                                                <i class="fa fa-shield" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning">
                                                <i class="fa fa-shield" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    
    

    <script>
        $(document).ready(function($) {
            $("#register-form").validate({
                rules: {
                    Men_Name: {
                        required: true,
                        maxlength: 255
                    },

                   
                    Men_FullDesc: "required",
                    Men_SerialOrder: "required"

                },
                messages: {
                    Men_Name: {
                        required: "This field is required",
                        maxlength: "Maximum length exceeded"
                    },
                   
                    Men_SubMenuExists: "This field is required",

                  
                    Men_FullDesc: "This field is required",
                    Men_SerialOrder: "This field is required"
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
                Men_Name: "#Men_Name-error",
                  Men_SubMenuExists: "#Men_SubMenuExists-error",

                Men_FullDesc: "#Men_FullDesc-error",
                Men_SerialOrder: "#Men_SerialOrder-error",
            };
        });
    </script>

 

    <script>
        function displaySelectedImage(input, fileNameId, previewId) {
            var selectedFileName = input.files[0].name;
            document.getElementById(fileNameId).value = selectedFileName;
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }

        function selectImage(inputId) {
            $('#' + inputId).Menck();
        }
    </script>
@endsection
