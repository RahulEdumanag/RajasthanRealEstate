 @extends('frontend.layouts.master')
 @section('title', 'Sub Menu Details')
 @section('content')
     <section class="page-banner section-padding pt-xs-60 pt-sm-80 overflow-hidden mobile">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-md-12">
                     <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                         <div class="page-title">
                             <h1>{{ $submenuModel->SubMen_Name }} Details</h1>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="aboutus">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 col-md-12">
                     <br /> <br />
                     <!-- <h5 class=" text-uppercase mb-3" data-aos="fade-up" data-aos-duration="1000">
                                {{ $submenuModel->Pag_ShortDesc }}
                            </h5>    <br/> -->
                     <p>{!! $submenuModel->SubMen_FullDesc !!}</p>
                 </div>

             </div>
         </div>
     </section>

 @stop
