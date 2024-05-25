@extends('backend.layouts.master')
@section('title', 'Sub Menu ')
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
                <div class="page-title-wrapper d-flex justify-content-between align-items-center">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                        </div>
                        <h5 class="py-3">
                            <span class="text-muted fw-light">Sub Menu /</span> List
                        </h5>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/submenu/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>Add Sub Menu
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
                                    <td>{{ $value->SubMen_Name }} </td>
                                    <td>{{ $value->SubMen_ShortDesc }} </td>
                                    <td> {{ $value->SubMen_SerialOrder }} </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.submenu.edit', encodeId($value->SubMen_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if ($value->SubMen_AdminExists == 'on' && Auth::user()->EmpRegistration->Emp_Role == '1')
                                            <span class='me-2'>
                                                @if ($value->SubMen_Status == 0)
                                                    <a class="btn btn-success"
                                                        href="{{ URL::to('admin/submenu/active', $value->SubMen_Id) }}"><i
                                                            class="fa fa-check-circle active"></i>
                                                    </a>
                                                @elseif ($value->SubMen_Status == 1)
                                                    <a class="btn btn-danger"
                                                        href="{{ URL::to('admin/submenu/inactive', $value->SubMen_Id) }}"><i
                                                            class="fa fa-times-circle inactive"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-warning">Unknown</span>
                                                @endif
                                            </span>
                                            <form action=" {{ route('admin.submenu.destroy', $value->SubMen_Id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @elseif($value->SubMen_AdminExists == null)
                                            <span class='me-2'>
                                                @if ($value->SubMen_Status == 0)
                                                    <a class="btn btn-success"
                                                        href="{{ URL::to('admin/submenu/active', $value->SubMen_Id) }}"><i
                                                            class="fa fa-check-circle active"></i>
                                                    </a>
                                                @elseif ($value->SubMen_Status == 1)
                                                    <a class="btn btn-danger"
                                                        href="{{ URL::to('admin/submenu/inactive', $value->SubMen_Id) }}"><i
                                                            class="fa fa-times-circle inactive"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-warning">Unknown</span>
                                                @endif
                                            </span>
                                            <form action=" {{ route('admin.submenu.destroy', $value->SubMen_Id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class='me-2'>
                                                <span class='me-2'>
                                                    @if ($value->SubMen_Status == 0)
                                                        <a class="btn btn-success"
                                                            href="{{ URL::to('admin/submenu/active', $value->SubMen_Id) }}"><i
                                                                class="fa fa-check-circle active"></i>
                                                        </a>
                                                    @elseif ($value->SubMen_Status == 1)
                                                        <a class="btn btn-danger"
                                                            href="{{ URL::to('admin/submenu/inactive', $value->SubMen_Id) }}"><i
                                                                class="fa fa-times-circle inactive"></i>
                                                        </a>
                                                    @else
                                                        <span class="badge badge-warning">Unknown</span>
                                                    @endif
                                                </span>
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
    @stop
