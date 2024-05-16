@extends('frontend.layouts.master')
@section('title', 'Franchise')
@section('content')


    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="breadcrumb-list">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">‎ </a></li>
                                <li class="breadcrumb-item">‎ </li>
                                <li class="breadcrumb-item">‎ </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Breadcrumb -->
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h1 class="mb-0">‎ </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Help Details -->

    <style>
        @media only screen and (max-width: 767px) {
            .mx-auto {

                margin-top: 75px;
            }

            .mobileCss {

                margin-bottom: 15px;
            }
        }
    </style>
    <div class="page-content mt-5 m-3">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-md-12 mx-auto ">
                    <div class="support-wrap" style="margin-top: 3%; ">
                        <h5>Submit a Request</h5>
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
                        <form method="post" action="{{ route('contact.Cstore') }}" id="contact-form"
                            class="default-form border p-4 mb-5 mt-4">
                            @csrf


                            <div class="row">
                                <div class="input-block col-lg-6 mb-3">

                                    <input type="text" class="form-control mobileCss" id="Enq_Name" name='Enq_Name'
                                        placeholder="Your Name" required>
                                </div>
                                <div class="input-block col-lg-6">

                                    <input type="number" id="Enq_Number" class="form-control mobileCss" name='Enq_Number'
                                        placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-block col-lg-12 mb-3">

                                    <input type="email" id="Enq_Email" class="form-control mobileCss" name='Enq_Email'
                                        placeholder="Your e-mail">
                                </div>
                            </div>

                            <!-- Hidden input to store the selected value from the hidden select -->
                            <input type="hidden" id="hidden_Enq_ConCat_Id" name="Enq_ConCat_Id">

                            <!-- Hidden select for storing the value -->
                            <div class="row mt-3 mb-3 " style="display: none;">
                                <div class="input-block col-lg-12" >
                                    
                                    <select class="form-control" style="display: none;" id="Enq_ConCat_Id"
                                        name="Enq_ConCat_Id">
                                        <option value="Franchise"></option>
                                    </select>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-dark mt-1">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- /Help Details -->

@endsection
