@extends('backend.layouts.master')
@section('title', 'Admin Menu')
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
                <span class="text-muted fw-light">Admin Menu/</span> List
            </h5>
            <div class="page-title-actions">
                <a href="{{ URL::to('admin/adminMenu/create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Admin Menu
                </a>
            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th> Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>{{ $value->AddMen_Name }} </td>
                                <td>{{ $value->AddMen_URL }} </td>
                                <td> {{ $value->AddMen_SerialOrder }} </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.adminMenu.edit', encodeId($value->AddMen_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>
                                    <span class='me-2'>
                                        @if ($value->AddMen_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/adminMenu/active', $value->AddMen_Id) }}"><i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->AddMen_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/adminMenu/inactive', $value->AddMen_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i> </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>

                                    <form action=" {{ route('admin.adminMenu.destroy', $value->AddMen_Id) }}"
                                        method="POST" id="deleteForm">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
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
