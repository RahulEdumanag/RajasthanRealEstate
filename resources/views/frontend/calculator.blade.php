@extends('frontend.layouts.master')
@section('title', 'Booking')
@section('content')
    <style>
        ::placeholder {
            color: gray;
            opacity: 1;
        }
    </style>
    <!--===== Loan Calculator =====-->
    <section id="loan-calculator">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-sm-2 col-xs-12"></div>
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="calc">
                        <div class="row">
                            <div class="col-md-12 text-center bottom40">
                                <h2 class="text-uppercase bottom10">Loan <span class="color_red">Calculator</span></h2>
                                <div class="text-center seprator">
                                    <div class="line_4"></div>
                                    <div class="line_5"></div>
                                    <div class="line_6"></div>
                                </div>
                                <p>We have Properties in these Areas View a list of Featured Properties.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <label for="amount" class="fa fa-rupee"></label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" id="amount" name="amount" placeholder="Loan Amount">
                            </div>
                        </div>
                        <div class="row  p-b-30  p-t-30">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <label for="amount" class="fa fa-calendar"></label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" id="months" placeholder="Months">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <label for="amount" class="fa fa-calendar"></label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" id="years" placeholder="Years">
                            </div>
                        </div>
                        <div class="row  p-b-30  p-t-30">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <label for="amount" class="fa interest"></label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" id="interest" placeholder="Interest Rate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <label for="amount" class="fa fa-arrow-down"></label>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" id="down" placeholder="Down Payment">
                            </div>
                        </div>
                        <div class="row  p-b-30  p-t-30">
                            <div class="col-md-12">
                                <button class="btn" onclick="myFunction()">Calculate</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p id="output" style="color: gray;">Monthly Payment</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ URL::to('/calculator') }}" class="reset">Reset</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-2 col-xs-12"></div>
            </div>
        </div>
    </section>
    <!--===== #/Loan Calculator =====-->
@endsection
