@extends('backend.layouts.master')
@section('title', 'Contact')
@section('content')
    <style>
        .serial-number {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .serial-number:hover {
            overflow: visible;
            white-space: normal;
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
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">All Enquiries /</span> List
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
                            @if (getSelectedValue() == '38')
                                <th>Property Type</th>
                            @endif
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <!-- <td class="serial-number" title="{{ $value->Con_ConCat_Id ?? 'N/A' }}">
                                        {{ Str::limit($value->Con_ConCat_Id ?? 'N/A', 10) }}
                                    </td> -->
                                @if (getSelectedValue() == '38')
                                    <td class="serial-number">
                                        {{ $value->propertyType->PTyp_Name ?? 'N/A' }}
                                    </td>
                                @endif
                                <td class="serial-number" title="{{ $value->Con_Name }}">
                                    {{ Str::limit($value->Con_Name, 15) }}
                                </td>
                                <td class="serial-number" title="{{ $value->Con_Email }}">
                                    <a href="mailto:{{ $value->Con_Email }}">
                                        {{ Str::limit($value->Con_Email, 10) }}</a>
                                </td>
                                <td class="serial-number" title="{{ $value->Con_Number }}">
                                    <a href="callto:{{ $value->Con_Number }}">
                                        {{ Str::limit($value->Con_Number, 10) }}</a>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.contacts.edit', encodeId($value->Con_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <span class='me-2'>
                                        @if ($value->Con_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/contacts/active', $value->Con_Id) }}"><i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Con_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/contacts/inactive', $value->Con_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i></a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>
                                    <form action=" {{ route('admin.contacts.destroy', $value->Con_Id) }}" method="POST"
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