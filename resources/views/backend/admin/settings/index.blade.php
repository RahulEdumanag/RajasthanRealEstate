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
                        <span class="text-muted fw-light">Settings/</span> List
                    </h5>
                </div>
                @if ($model->count() === 0)
                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/settings/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>Add Setting
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
                            <th>Image Max Size</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr>
                                <td class="serial-number"> {{ $loop->iteration }}</td>

                                <td>
                                    @if ($value->imgsize)
                                        {{ Str::limit($value->imgsize->Img_Value, 50) }}
                                    @else
                                        No Imgsize Found
                                    @endif
                                </td>

                                <td class="display-short-txt" title="{{ $value->Set_Website }}">
                                    @if ($value->Set_Website == 0)
                                        Active
                                    @elseif($value->Set_Website == 1)
                                        Under Construction
                                    @else
                                        {{ Str::limit($value->Set_Website, 20) }}
                                    @endif
                                </td>

                                <td class="d-flex">
                                    <a href="{{ route('admin.settings.edit', encodeId($value->Set_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>

                                    </a>



                                    <span class='me-2'>
                                        @if ($value->Set_Status == 0)
                                            <a class="btn btn-success"
                                                href="{{ URL::to('admin/settings/active', $value->Set_Id) }}"><i
                                                    class="fa fa-check-circle active"></i>
                                            </a>
                                        @elseif ($value->Set_Status == 1)
                                            <a class="btn btn-danger"
                                                href="{{ URL::to('admin/settings/inactive', $value->Set_Id) }}"><i
                                                    class="fa fa-times-circle inactive"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </span>
                                    <form action=" {{ route('admin.settings.destroy', $value->Set_Id) }}" method="POST"
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
