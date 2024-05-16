@extends('backend.layouts.master')
@section('title', 'tools')
@section('content')




    @if (session('error'))
        <section class="container">
            <div class="row py-3 justify-content-center">
                <div class="col-3 alert alert-danger  text-center ">
                    {{ session('error') }}

                </div>
            </div>
        </section>
   @endif

    <div class="card">
        <h5 class="card-header">Master</h5>
        <div class="card-body">
            <form id='create' action="{{ Route('admin.master.store') }}" enctype="multipart/form-data" method="post"
                accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
               
                <div class="row">


                    <div class="clearfix"></div>                  


                    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                        <label class="form-label" for="title">Master Title  <span style="color:red">*</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="title" name="title" class="form-control credit-card-mask"
                                placeholder="Enter your master title" aria-describedby="name2" />
                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                    class="card-type"></span></span>                        </div>
                        @error('title')
                        <div class="has-error mt-2" style="color: red"> Master title required.</div>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                        <label class="form-label" for="value">Master value  <span style="color:red">*</span></label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="value" name="value" class="form-control credit-card-mask"
                                placeholder="Enter your master value" aria-describedby="name2" />
                            <span class="input-group-text cursor-pointer p-1" id="name2"><span
                                    class="card-type"></span></span>                        </div>
                        @error('value')
                        <div class="has-error mt-2" style="color: red"> Master value required.</div>
                        @enderror
                    </div>

 
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn  button-submit" style="background-color:#7367f0 ; color:white" data-loading-text="Loading..."><span
                                class="fa fa-save fa-fw"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@stop
