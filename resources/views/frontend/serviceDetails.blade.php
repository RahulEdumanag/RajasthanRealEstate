@extends('frontend.layouts.master')
@section('title', 'ServiceDetails ')
@section('content')

    <style>
        @media only screen and (max-width: 600px) {
            .mobile {
                margin-top: 55% !important;
            }
        }
    </style>
    <div class="mobile text-center" style="margin-top: 15%;">
        <h1>{{ $ServiceDetails->Pag_Name }}</h1>
        <p class =""> {!! $ServiceDetails->Pag_FullDesc !!} </p>
    </div>

@endsection
