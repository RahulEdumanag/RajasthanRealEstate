@extends('backend.layouts.master')
@section('title', 'Property Type')
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
                        <span class="text-muted fw-light">Property Type /</span> List
                    </h5>
                </div>
                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/propertyType/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Property Type
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
                            <th>propertyType</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="DragNdDrop">
                        @foreach ($model as $value)
                            @if (Auth::user()->registration->Reg_Role === 'SUPERADMIN' ||
                                    (!$value->PTyp_AdminExists && Auth::user()->role !== 'SUPERADMIN'))
                                <tr data-id="{{ $value->PTyp_Id }}">
                                    <td class="serial-number">
                                        <!-- <i class="fa fa-bars drag-handle" style="cursor: grab;"></i> -->
                                        <i class="fas fa-grip-vertical drag-handle"style="cursor: grab;"></i>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="serial-number" title="{{ $value->PTyp_Name }}">
                                        {{ Str::limit($value->PTyp_Name, 30) }}
                                    </td>
                                    
                                    <td class="d-flex"> <a href="{{ route('admin.propertyType.edit', encodeId($value->PTyp_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <span class='me-2'>
                                            @if ($value->PTyp_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/propertyType/active', $value->PTyp_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->PTyp_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/propertyType/inactive', $value->PTyp_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i></a>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.propertyType.destroy', $value->PTyp_Id) }}" method="POST"
                                            id="deleteForm">
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
