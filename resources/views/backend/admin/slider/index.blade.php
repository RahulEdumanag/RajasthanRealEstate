@extends('backend.layouts.master')
@section('title', 'Create')
@section('title', 'Slider')
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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="py-3">
                <span class="text-muted fw-light">Slider/</span> Add Slider
            </h5>
            <div class="page-title-actions">
                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Slider
                </a>
            </div>
        </div>
        <div>
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table border-top" id="footerDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th> Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $value)
                            <tr data-id="{{ $value->Pag_Id }}">
                                <td class="serial-number">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $value->Pag_Name }} </td>
                                <?php
                                $userImage = '/uploads/' . $value->Pag_Image;
                                $defaultImage = '/assets/images/default.jpg';
                                if (file_exists(public_path($userImage))) {
                                    $imagePath = $userImage;
                                } else {
                                    $imagePath = $defaultImage;
                                }
                                ?>
                                <td><img id="imageResult" src="{{ URL::to($imagePath) }}" alt=""
                                        class="img-fluid rounded shadow-sm mx-auto d-block" style="width:45px;"></td>
                                <td> {{ $value->Pag_SerialOrder }} </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.slider.edit', encodeId($value->Pag_Id)) }}"
                                        class="btn btn-primary me-2">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @if ($value->Pag_AdminExists == 'on' && Auth::user()->EmpRegistration->Emp_Role == '1')
                                        <span class='me-2'>
                                            @if ($value->Pag_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/slider/active', $value->Pag_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Pag_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/slider/inactive', $value->Pag_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.slider.destroy', $value->Pag_Id) }}" method="POST"
                                            id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @elseif($value->Pag_AdminExists == null)
                                        <span class='me-2'>
                                            @if ($value->Pag_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/slider/active', $value->Pag_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Pag_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/slider/inactive', $value->Pag_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action=" {{ route('admin.slider.destroy', $value->Pag_Id) }}" method="POST"
                                            id="deleteForm">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class='me-2'>
                                            <button type="button" class="btn btn-warning">
                                                <i class="fa fa-shield" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning">
                                                <i class="fa fa-shield" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
