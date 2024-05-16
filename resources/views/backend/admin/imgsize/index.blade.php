@extends('backend.layouts.master')
@section('title', 'Image Size')
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
            <div class="page-title-wrapper d-flex justify-content-between align-items-center">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="bi bi-newspaper icon-gradient bg-mean-fruit"></i>
                    </div>
                    <h5 class="py-3">
                        <span class="text-muted fw-light">Image Size /</span> List
                    </h5>
                </div>
              
                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/imgsize/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add Image Size
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
                            <th>Image Title</th>
                            <th>Image Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>

                                <td class="serial-number" title="{{ $value->Img_Value }}">
                                    {{ Str::limit($value->Img_Value, 30) }}
                                </td>
                                <td class="serial-number" title="{{ $value->Img_Title }}">
                                    {{ Str::limit($value->Img_Title, 30) }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.imgsize.edit', encodeId($value->Img_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>



                                    <span class='me-2'>
                                        @if ($value->Img_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/imgsize/active', $value->Img_Id) }}"><i
                                                    class="fa fa-check-circle active"></i>
                                            </a>
                                        @elseif ($value->Img_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/imgsize/inactive', $value->Img_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>
                                    <form action=" {{ route('admin.imgsize.destroy', $value->Img_Id) }}" method="POST"
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
