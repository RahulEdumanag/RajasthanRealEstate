@extends('backend.layouts.master')
@section('title', 'Addtools')
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
    <div class="container-xxl flex-grow-1 container-p-y card">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                    </div>
                    <h5 class="py-3 ">
                        <span class="text-muted fw-light">Submaster /</span> List
                    </h5>
                    <div class="d-inline-block ml-3 pb-3">
                        <a href="{{ URL::to('admin/submaster/create') }}"
                            class="btn "style="background-color:#7367f0 ; color:white">
                            <i class="bi bi-plus-lg"></i>
                            Add Sub Master
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-nowrap">subMaster Name</th>
                            <th class="text-nowrap">subMaster Value</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submaster as $value)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td class="fw-bold text-nowrap ">{{ $value->title }}</td>
                                <td class="fw-bold">{{ $value->value }}</td>
                                <?php
                                $userImage = '/uploads/' . $value->logo;
                                $defaultImage = '/assets/images/default.jpg';
                                if (file_exists(public_path($userImage))) {
                                    $imagePath = $userImage;
                                } else {
                                    $imagePath = $defaultImage;
                                }
                                ?>
                                <td style="  width: 58px;">
                                    <img class="img-thumbnail img-fluid tool-img-edit" src="{{ URL::to($imagePath) }}"
                                        style="width: 45px;" />
                                </td>
                                <td class="d-flex">
                                    <a href="{{ Route('admin.submaster.edit', $value->id) }}"
                                        class="btn fw-bold btn-primary text-nowrap" data-mdb-ripple-color="dark">
                                        <i class="metismenu-icon bi bi-gear-wide-connected"></i>
                                        Edit
                                    </a>
                                    {{-- delete --}}
                                    <form action="{{ route('admin.submaster.destroy', $value->id) }}" method="POST"
                                        id="deleteForm">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger ms-3 text-nowrap"
                                            onclick="confirmDelete(this)">
                                            <i class="fa fa-trash-alt"></i>

                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
