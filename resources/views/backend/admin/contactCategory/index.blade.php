@extends('backend.layouts.master')
@section('title', 'Contact Category')
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
                        <span class="text-muted fw-light">Contact Category /</span> List
                    </h5>
                </div>

                <div class="page-title-actions">
                    <a href="{{ URL::to('admin/contactCategory/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add Contact Category
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
                            <th>Contact Category</th>
                            <!-- <th> Value</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="DragNdDrop">
                        @foreach ($model as $value)
                          
                                <tr data-id="{{ $value->ConCat_Id }}">
                                    <td class="serial-number">
                                        <!-- <i class="fa fa-bars drag-handle" style="cursor: grab;"></i> -->
                                        <i class="fas fa-grip-vertical drag-handle"style="cursor: grab;"></i>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="serial-number" title="{{ $value->ConCat_Title }}">
                                        {{ Str::limit($value->ConCat_Title, 30) }}
                                    </td>
                                    <!-- <td class="serial-number" title="{{ $value->ConCat_Value }}">
                                        {{ Str::limit($value->ConCat_Value, 30) }}
                                    </td> -->
                                    <td class="d-flex"> <a
                                            href="{{ route('admin.contactCategory.edit', encodeId($value->ConCat_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>

                                        </a>
                                        <span class='me-2'>
                                            @if ($value->ConCat_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/contactCategory/active', $value->ConCat_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->ConCat_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/contactCategory/inactive', $value->ConCat_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i></a>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.contactCategory.destroy', $value->ConCat_Id) }}"
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
