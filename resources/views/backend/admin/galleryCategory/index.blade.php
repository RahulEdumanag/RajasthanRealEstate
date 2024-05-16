@extends('backend.layouts.master')
@section('title', 'Gallery-Categories')
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
                            <span class="text-muted fw-light">Gallery Category /</span> List
                        </h5>
                    </div>

                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/galleryCategory/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add Gallery Category
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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                <tr>
                                    <td class="serial-number"> {{ $loop->iteration }}</td>
                                    <td class="serial-number"> {{ $value->GallCat_Name }}</td>



                                    <?php
                                    $userImage = '/uploads/' . $value->GallCat_Image;
                                    $defaultImage = '/assets/images/default.jpg';
                                    if (file_exists(public_path($userImage))) {
                                        $imagePath = $userImage;
                                    } else {
                                        $imagePath = $defaultImage;
                                    }
                                    
                                    ?>


                                    <td><img id="imageResult" src="{{ URL::to($imagePath) }}" alt=""
                                            class="img-fluid rounded shadow-sm mx-auto d-block" style="width:45px;"></td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.galleryCategory.edit', encodeId($value->GallCat_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <span class='me-2'>
                                            @if ($value->GallCat_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/galleryCategory/active', $value->GallCat_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->GallCat_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/galleryCategory/inactive', $value->GallCat_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>


                                        <form action=" {{ route('admin.galleryCategory.destroy', $value->GallCat_Id) }}"
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
