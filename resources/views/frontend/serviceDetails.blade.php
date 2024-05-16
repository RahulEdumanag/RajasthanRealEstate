@extends('frontend.layouts.master')
@section('title', 'ServiceDetails ')
@section('content')
    <section id="about_page_three" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_text mt-30">
                        <p> {!! $ServiceDetails->Pag_FullDesc !!} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
