@extends('frontend.layouts.master')
@section('title', 'Faq')
@section('content')
<!--===== Faq =====-->
<section id="faq2" class="padding bg_light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
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
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Morbi vehicula mauris vel bibendum molestie. Ut varius purus in odio elementum ?
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo" class="collapsed">
                          Donec condimentum neque est, quis finibus velit laoreet vel. ?
                        </a>
                      </h4>
                    </div>
                    <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="false" aria-controls="collapsethree" class="collapsed">
                         Suspendisse et enim semper, porta nunc ut, ullamcorper magna.?
                        </a>
                      </h4>
                    </div>
                    <div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour" class="collapsed">
                          Donec condimentum neque est, quis finibus velit laoreet vel. ?
                        </a>
                      </h4>
                    </div>
                    <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive" class="collapsed">
                         Suspendisse et enim semper, porta nunc ut, ullamcorper magna.?
                        </a>
                      </h4>
                    </div>
                    <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix" class="collapsed">
                          Donec condimentum neque est, quis finibus velit laoreet vel. ?
                        </a>
                      </h4>
                    </div>
                    <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSeven">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseseven" class="collapsed">
                         Suspendisse et enim semper, porta nunc ut, ullamcorper magna.?
                        </a>
                      </h4>
                    </div>
                    <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingEight">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="false" aria-controls="collapseeight" class="collapsed">
                          Donec condimentum neque est, quis finibus velit laoreet vel. ?
                        </a>
                      </h4>
                    </div>
                    <div id="collapseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingNine">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="false" aria-controls="collapsenine" class="collapsed">
                         Suspendisse et enim semper, porta nunc ut, ullamcorper magna.?
                        </a>
                      </h4>
                    </div>
                    <div id="collapsenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                          <div class="listing-special-detail">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec cursus orci, id pulvinar arcu. Proin pellentesque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer molestie viverra neque sit amet posuere. Nullam eget ultricies mi. Proin pulvinar quam porttitor consequat pulvinar. Etiam non neque et quam euismod cursus. Praesent eu sem interdum, pharetra metus sed, sollicitudin sem. Curabitur tincidunt dolor quis dolor iaculis, ut maximus ante fermentum </p>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</section>
<!--===== #/Faq =====-->
@endsection