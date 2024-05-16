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
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Contact/</span> Add Contact
        </h4>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <form id="register-form" action="{{ route('admin.contact.store') }}" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf <div class="row g-3">
                                <div class="col-sm-12 form-group ">
                                    <label class="form-label" for="FullDesc">FullDesc</label>
                                    <textarea class="ckeditor form-control" id="Pag_FullDesc" name="Pag_FullDesc" class="form-control"></textarea>
                                    <span id="Pag_FullDesc-error" class="error" style="color: red;"></span>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn " style="background-color:#7367f0;color:white">
                                        <i class="fa fa-save fa-fw"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
