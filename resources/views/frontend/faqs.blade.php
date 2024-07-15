@extends('frontend.layouts.master')
@section('title', 'Faq')
@section('content')
    <style>
        .no-results-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .no-results-text {
            font-size: 20px;
            color: #555;
            margin-bottom: 10px;
        }
        .no-results-image img {
            max-width: 100%;
            height: auto;
        }
         .hoverText:hover {
            color: white !important;
            
        }
        .hoverText {
            color: white !important;
            
        }
    </style>
    <!--===== Faq =====-->
    <section id="faq2" class="padding bg_light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (!$FaqModel->isEmpty())
                        <div class="details-heading">
                            <div class="row">
                                <div class="col-md-12 bottom40">
                                    <h2 class="text-uppercase">Ask Your <span class="color_red">Question</span></h2>
                                    <div class="line_1"></div>
                                    <div class="line_2"></div>
                                    <div class="line_3"></div>
                                    <p>Didn't find an answer?</p>
                                </div>
                            </div>
                            <div class="panel-group m_t40" id="accordion" role="tablist" aria-multiselectable="true">
                                @foreach ($FaqModel as $index => $value)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                            <h4 class="panel-title">
                                                <a role="button"class="hoverText" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapse{{ $index }}" aria-expanded="false"
                                                    aria-controls="collapse{{ $index }}">
                                                    {{ $value->Pag_Name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $index }}" class="panel-collapse collapse"
                                            role="tabpanel" aria-labelledby="heading{{ $index }}">
                                            <div class="panel-body">
                                                <div class="listing-special-detail">
                                                    <p> {{ $value->Pag_ShortDesc }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="no-results-container">
                                <h4 class="no-results-text">No results found, please try again.</h4>
                                <div class="no-results-image">
                                    <img src="https://i.pinimg.com/originals/49/e5/8d/49e58d5922019b8ec4642a2e2b9291c2.png"
                                        alt="{{$WebInfoModel->WebInf_Name}}" style="height: 25%; width: 25%;">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--===== #/Faq =====-->
@endsection
