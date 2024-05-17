@extends('frontend.layouts.master')
@section('title', 'UsefullLink')
@section('content')
    <section id="about_page_three" class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 bottom40">
                        <h2 class="text-uppercase"> {{ $usefulLinkModel->Pag_Name ?? 'N/A' }}</span></h2>
                        <div class="line_1"></div>
                        <div class="line_2"></div>
                        <div class="line_3"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="about_text mt-30">
                            <p> {!! $usefulLinkModel->Pag_FullDesc ?? 'N/A' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
