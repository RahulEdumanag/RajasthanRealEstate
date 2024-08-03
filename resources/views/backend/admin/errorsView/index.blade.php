@extends('backend.layouts.master')
@section('title', 'Menu')
@section('content')
<style>
    .truncate {
        max-width: 150px; /* Set the maximum width you want */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
    }

    .popup {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 10px;
        z-index: 1;
        font-size: 12px; /* Set your desired font size for the popup */
    }
</style>

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
                        <span class="text-muted fw-light">Errors /</span> List
                    </h5>
                </div>

                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/errorsView/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Error
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
                            <th>Reg Organization Name</th>
                            <th>Erorr Meaasge</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>{{ $value->registration->Reg_Organization_Name ?? 'N/A' }}</td>
                                <td class="truncate" title="{{ $value->Error_Message }}">{{ $value->Error_Message }}</td>
                                <td class="truncate">{{ $value->Error_CreatedDate }}</td>

                                <td class="d-flex">
                                    <a href="{{ route('admin.errorsView.edit', encodeId($value->Error_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>
                                    <span class='me-2'>
                                        @if ($value->Error_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/errorsView/active', $value->Error_Id) }}"> <i
                                                    class="fa fa-check-circle active"></i>
                                            </a>
                                        @elseif ($value->Error_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/errorsView/inactive', $value->Error_Id) }}"> <i
                                                    class="fa fa-times-circle inactive"></i> </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>


                                    <form action=" {{ route('admin.errorsView.destroy', $value->Error_Id) }}"
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
