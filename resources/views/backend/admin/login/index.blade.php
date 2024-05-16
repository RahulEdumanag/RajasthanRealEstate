@extends('backend.layouts.master')
@section('title', 'Page')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container-xxl flex-grow-1 container-p-y card">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                        </div>
                        <h5 class="py-3">
                            <span class="text-muted fw-light">login /</span> List
                        </h5>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/login/create') }}" class="btn "
                            style="background-color:#7367f0 ; color:white">
                            <i class="bi bi-plus-lg"></i> Add login
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="card-datatable table-responsive">
                    <table class="invoice-list-table table border-top" id="footerDataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                @if (Auth::user()->registration->Reg_Role === 'SUPERADMIN' ||
                                        (!$value->Pag_AdminExists && Auth::user()->role !== 'SUPERADMIN'))
                                    <tr>
                                        <td class="serial-number"> {{ $loop->iteration }}</td>
                                        <td>{{ $value->Log_Username }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.login.edit',   encodeId($value->Log_Id) ) }}"
                                                class="btn btn-primary me-2">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <span class="me-2">

                                                @if ($value->Log_Status == 1)
                                                    <a class="btn btn-success"
                                                        href="{{ URL::to('admin/login/active', $value->Log_Id) }}">
                                                        <i class="fa fa-check-circle active"></i>
                                                    </a>
                                                @elseif ($value->Log_Status == 0)
                                                    <a class="btn btn-danger"
                                                        href="{{ URL::to('admin/login/inactive', $value->Log_Id) }}">
                                                        <i class="fa fa-times-circle inactive"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-warning">Unknown</span>
                                                @endif


                                            </span>

                                            <form action=" {{ route('admin.login.destroy', $value->Log_Id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                    <i class="fa fa-trash-alt"></i>

                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
