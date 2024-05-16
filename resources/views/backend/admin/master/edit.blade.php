@extends('backend.layouts.master')
@section('content')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Master Record</h5>
                    <form id="edit" action="{{ route('admin.master.update', $master->id) }}" enctype="multipart/form-data"
                        method="post" accept-charset="utf-8" class="needs-validation">
                        @csrf                        
                        {{ method_field('PATCH') }}
                        <div class="row">
                       <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $master->title }}" placeholder="Enter title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>                            @enderror
                        </div>
                       <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" name="value"
                                value="{{ $master->value }}" placeholder="Enter value">
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>                            @enderror
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
@stop
