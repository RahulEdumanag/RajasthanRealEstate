@extends('backend.layouts.master')
@section('title', 'Gallery')
@section('content')
    <style>
        .image-column {
            display: flex;
            align-items: center;
        }

        .image-container {
            display: flex;
            gap: 10px;
            /* Adjust the gap as needed */
            flex-wrap: wrap;
        }

        .imageText {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }

        .imageText:hover {}
    </style>
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
                            <span class="text-muted fw-light">Gallery /</span> List
                        </h5>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{ URL::to('admin/gallery/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add Gallery
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
                                <!-- <th>Name</th> -->
                                <th>Gallery Category Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                <tr>
                                    <td class="serial-number"> {{ $loop->iteration }}</td>
                                    <td> {{ $value->galleryCat->GallCat_Name }}</td>

                                    <td style="position: relative;">
                                        <div>
                                            <?php
                                            $userImages = $value->Gall_Image ? explode(',', $value->Gall_Image) : []; // Assuming Gall_Image is a comma-separated string
                                            $defaultImage = '/assets/images/default.jpg';
                                            $firstImagePath = count($userImages) > 0 ? '/uploads/' . $userImages[0] : $defaultImage;
                                            if (!file_exists(public_path($firstImagePath))) {
                                                $firstImagePath = $defaultImage;
                                            }
                                            ?>
                                            <img src="{{ URL::to($firstImagePath) }}" alt=""
                                                class="img-fluid rounded shadow-sm mx-auto d-block"
                                                style="width: 50%; height: 100px; object-fit: cover;">
                                        </div>
                                        @if (count($userImages) > 1)
                                            <div class="imageText">
                                                Multi images..
                                            </div>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.gallery.edit', encodeId($value->Gall_Id)) }}"
                                            class="btn btn-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <span class='me-2'>
                                            @if ($value->Gall_Status == 0)
                                                <a class="btn btn-success"
                                                    href="{{ URL::to('admin/gallery/active', $value->Gall_Id) }}"><i
                                                        class="fa fa-check-circle active"></i>
                                                </a>
                                            @elseif ($value->Gall_Status == 1)
                                                <a class="btn btn-danger"
                                                    href="{{ URL::to('admin/gallery/inactive', $value->Gall_Id) }}"><i
                                                        class="fa fa-times-circle inactive"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </span>
                                        <form action="{{ route('admin.gallery.destroy', $value->Gall_Id) }}" method="POST"
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
