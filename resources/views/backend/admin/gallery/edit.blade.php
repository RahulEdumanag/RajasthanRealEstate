@extends('backend.layouts.master')
@section('content')
@section('title', 'Edit')
<style>
    .img-box {
        margin: 5px;
        position: relative;
    }

    .img-box img {
        width: 100px;
        cursor: pointer;
    }

    .img-box input[type="checkbox"] {
        position: absolute;
        top: 5px;
        left: 5px;
        opacity: 0;
        z-index: 2;
    }

    .img-box input[type="checkbox"]:checked+img {
        border: 2px solid red;
    }

    .img-box:hover {}
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

<div class="container-fluid">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="py-3">
            <span class="text-muted fw-light">Gallery/</span> Edit Gallery
        </h5>
        <div class="page-title-actions">
            <a href="{{ URL::to('admin/gallery') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Gallery List
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card mb-4">
                <div class="card-body">

                    <form id='edit' action="{{ route('admin.gallery.update', $gallery->Gall_Id) }}"
                        enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="row g-3">
                            <!-- Your existing form fields -->


                            <div class="col-xl-12 col-md-12 col-sm-12 mb-4">
                                <label class="form-label" for="Select Gallery Image">Select Gallery Images</label>
                                <div id="selectedImagesPreview" style="display: flex; flex-wrap: wrap;">
                                    @foreach ($model as $image)
                                        @php
                                            $images = explode(',', $image->Gall_Image);
                                        @endphp

                                        @foreach ($images as $img)
                                            <div class="img-box">
                                                <input type="checkbox" name="selectedImages[]"
                                                    value="{{ $img }}" required>
                                                <img src="{{ asset('/uploads/' . $img) }}" alt="Selected Image"
                                                    class="img-fluid rounded shadow-sm mx-auto d-block"
                                                    style="width: 100%; height: 150px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                @error('selectedImages')
                                    <div class="has-error mt-2" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Remove Save Button -->
                        </div>
                    </form>

                    <form id='deleteImages' action="{{ route('admin.gallery.destroy', $gallery->Gall_Id) }}"
                        method="post" accept-charset="utf-8" class="mt-3">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-danger" onclick="confirmDeleteImages()">
                            <span class="fa fa-trash-alt"></span> Delete Selected Images
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Your existing scripts

    function confirmDeleteImages() {
        if (confirm('Are you sure you want to delete the selected images?')) {
            document.getElementById('edit').submit(); // Change 'deleteImages' to 'edit'
        }
    }
</script>

<script>
    // Add event listener to handle checkbox selection on image click
    document.querySelectorAll('.img-box img').forEach(function(img) {
        img.addEventListener('click', function() {
            var checkbox = this.previousElementSibling;
            checkbox.checked = !checkbox.checked;
        });
    });
</script>


@stop
