@extends('backend.layouts.master')
@section('title', 'Enquirie')
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
                            <th>Name</th>
                            <!-- <th>Email</th> -->
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>
                                <td>{{ $value->Enq_Name }}</td>
                                <!-- <td>{{ $value->Enq_Email }}</td> -->
                                <td>{{ $value->Enq_Number }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.enquirie.edit', encodeId($value->Enq_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-eye"></i>

                                    </a>

                                    <span class='me-2'>
                                        @if ($value->Enq_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/enquirie/active', $value->Enq_Id) }}"><i
                                                    class="fa fa-check-circle active"></i> </a>
                                        @elseif ($value->Enq_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/enquirie/inactive', $value->Enq_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i></a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>
                                    <form action=" {{ route('admin.enquirie.destroy', $value->Enq_Id) }}" method="POST"
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
