@extends('backend.layouts.master')
@section('title', 'HealthCheckup')
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
                            <span class="text-muted fw-light">Health Checkup /</span> List
                        </h5>
                    </div>

                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/healthCheckup/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add Health Checkup
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
                                <th>Checkup Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                @if (Auth::user()->EmpRegistration->Emp_Role === '1' ||
                                        (!$value->Pag_AdminExists && Auth::user()->EmpRegistration->Emp_Role !== '1'))
                                    <tr>
                                        <td class="serial-number"> {{ $loop->iteration }}</td>
                                        <td class="serial-number"> {{ $value->Pag_Name }}</td>
                                        <td class="serial-number"> {{ $value->Pag_ShortDesc }}</td>





                                        <td class="d-flex">
                                            <a href="{{ route('admin.healthCheckup.edit', encodeId($value->Pag_Id)) }}"
                                                class="btn btn-primary me-2">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <span class='me-2'>
                                                @if ($value->Pag_Status == 0)
                                                    <a class="btn btn-success"
                                                        href="{{ URL::to('admin/healthCheckup/active', $value->Pag_Id) }}"><i
                                                            class="fa fa-check-circle active"></i> </a>
                                                @elseif ($value->Pag_Status == 1)
                                                    <a class="btn btn-danger"
                                                        href="{{ URL::to('admin/healthCheckup/inactive', $value->Pag_Id) }}"><i
                                                            class="fa fa-times-circle inactive"></i></a>
                                                @else
                                                    <span class="badge badge-warning">Unknown</span>
                                                @endif

                                            </span>

                                            <form action=" {{ route('admin.healthCheckup.destroy', $value->Pag_Id) }}"
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
