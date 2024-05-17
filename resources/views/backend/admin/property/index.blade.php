@extends('backend.layouts.master')
@section('title', 'Property')
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
        @if (Auth::user()->EmpRegistration->Emp_Role == '1')
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="py-3">
                    <span class="text-muted fw-light">Property /</span> List
                </h5>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/property/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Property
                    </a>
                </div>
            </div>
        @endif
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>Email Id</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>{{ $value->Pro_Name }} </td>
                                <td>{{ $value->Pro_ContactNo }} </td>
                                <td>{{ $value->Pro_EmailId }} </td>

                                <td class="d-flex">
                                    <a href="{{ route('admin.property.edit', encodeId($value->Pro_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>
                                    <span class='me-2'>

                                        @if ($value->Pro_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/property/active', $value->Pro_Id) }}"> <i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Pro_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/property/inactive', $value->Pro_Id) }}"> <i
                                                    class="fa fa-times-circle inactive"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif

                                    </span>


                                    <form action=" {{ route('admin.property.destroy', $value->Pro_Id) }}" method="POST"
                                        id="deleteForm">
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
