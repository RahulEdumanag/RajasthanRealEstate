@extends('backend.layouts.master')
@section('title', 'Menu')
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
            <div class="page-title-wrapper d-flex justify-content-between align-items-center">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Menu /</span> List
                    </h5>
                </div>

                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/menu/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Menu
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
                                        <span class='me-2'>

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
