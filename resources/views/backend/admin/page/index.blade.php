@extends('backend.layouts.master')
@section('title', 'Page')
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
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Page /</span> List
                    </h5>
                </div>
                @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                    <div class="page-title-actions">
                        <a href="{{ route('admin.page.create') }}" class="btn "
                            style="background-color:#7367f0 ; color:white">
                            <i class="bi bi-plus-lg"></i> Add Page
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>ShortDesc</th>
                            <th>SerialOrder</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                         
                                <tr>
                                    <td class="serial-number"> {{ $loop->iteration }}</td>
                                    <td>{{ $value->Pag_Name }} </td>
                                    <td>{{ $value->Pag_ShortDesc }} </td>
                                    <td> {{ $value->Pag_SerialOrder }} </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.page.edit', encodeId($value->Pag_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if ($value->Pag_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/page/active', $value->Pag_Id) }}"><i class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Pag_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/page/inactive', $value->Pag_Id) }}"><i class="fa fa-times-circle inactive"></i></a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                        @if (Auth::user()->EmpRegistration->Emp_Role == '1')
                                            <form action=" {{ route('admin.page.destroy', $value->Pag_Id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                    <i class="fa fa-trash-alt"></i>

                                                </button>
                                            </form>
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
