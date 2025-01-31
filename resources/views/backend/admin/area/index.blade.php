@extends('backend.layouts.master')
@section('title', 'area')
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
                        <span class="text-muted fw-light">Area /</span> List
                    </h5>
                </div>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/area/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Area
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
                            <th>State</th>
                            <th>City</th>
                            <th>Area</th>
                            <!-- <th>Pin Code</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                             
                                <tr>
                                    <td class="serial-number">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="serial-number" title="{{ $value->city->state->Sta_Name }}">
                                    ({{ Str::limit($value->city->state->Sta_Name, 30) }})
                                    </td>
                                    <td class="serial-number" title="{{ $value->city->Cit_Name }}">
                                        {{ Str::limit($value->city->Cit_Name, 30) }}
                                    </td>

                                    <td class="serial-number" title="{{ $value->Are_Name }}">
                                        {{ Str::limit($value->Are_Name, 30) }}
                                    </td>
                                    <!-- <td> {{ $value->Are_Code }} </td> -->
                                    <td class="d-flex"> <a href="{{ route('admin.area.edit', encodeId($value->Are_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <span class='me-2'>
                                            @if ($value->Are_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/area/active', $value->Are_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Are_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/area/inactive', $value->Are_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i></a>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.area.destroy', $value->Are_Id) }}" method="POST"
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
