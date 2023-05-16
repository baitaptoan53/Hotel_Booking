@extends('layouts.master')
@section('title', 'Service')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
               <div class="container-fluid page-header-inner py-5">
                              <div class="container text-center pb-5">
                                             <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                                             <nav aria-label="breadcrumb">
                                                            <ol
                                                                           class="breadcrumb justify-content-center text-uppercase">
                                                                           <li class="breadcrumb-item"><a
                                                                                                         href="{{route('home.index')}}">{{__('messages.home')}}</a>
                                                                           </li>
                                                                           <li class="breadcrumb-item text-white active"
                                                                                          aria-current="page">Services
                                                                           </li>
                                                            </ol>
                                             </nav>
                              </div>
               </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5">
               <div class="container">
                              <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                             <h6 class="section-title text-center text-primary text-uppercase">Our
                                                            Services</h6>
                                             <h1 class="mb-5">{{__('messages.EXPLORE')}} <span
                                                                           class="text-primary text-uppercase">Services</span>
                                             </h1>
                              </div>
                              <div class="row g-4">
                                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                                            <a class="service-item rounded" href="">
                                                                           <div
                                                                                          class="service-icon bg-transparent border rounded p-1">
                                                                                          <div
                                                                                                         class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                                                                         <i
                                                                                                                        class="fa fa-hotel fa-2x text-primary"></i>
                                                                                          </div>
                                                                           </div>
                                                                           <h5 class="mb-3">Rooms & Appartment</h5>
                                                                           <p class="text-body mb-0">Erat ipsum justo
                                                                                          amet duo et elitr dolor, est
                                                                                          duo duo eos lorem sed diam
                                                                                          stet diam sed stet lorem.</p>
                                                            </a>
                                             </div>
                                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                                                            <a class="service-item rounded" href="">
                                                                           <div
                                                                                          class="service-icon bg-transparent border rounded p-1">
                                                                                          <div
                                                                                                         class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                                                                         <i
                                                                                                                        class="fa fa-utensils fa-2x text-primary"></i>
                                                                                          </div>
                                                                           </div>
                                                                           <h5 class="mb-3">Food & Restaurant</h5>
                                                                           <p class="text-body mb-0">Erat ipsum justo
                                                                                          amet duo et elitr dolor, est
                                                                                          duo duo eos lorem sed diam
                                                                                          stet diam sed stet lorem.</p>
                                                            </a>
                                             </div>
                                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                                            <a class="service-item rounded" href="">
                                                                           <div
                                                                                          class="service-icon bg-transparent border rounded p-1">
                                                                                          <div
                                                                                                         class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                                                                         <i
                                                                                                                        class="fa fa-spa fa-2x text-primary"></i>
                                                                                          </div>
                                                                           </div>
                                                                           <h5 class="mb-3">Spa & Fitness</h5>
                                                                           <p class="text-body mb-0">Erat ipsum justo
                                                                                          amet duo et elitr dolor, est
                                                                                          duo duo eos lorem sed diam
                                                                                          stet diam sed stet lorem.</p>
                                                            </a>
                                             </div>
                                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                                                            <a class="service-item rounded" href="">
                                                                           <div
                                                                                          class="service-icon bg-transparent border rounded p-1">
                                                                                          <div
                                                                                                         class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                                                                         <i
                                                                                                                        class="fa fa-swimmer fa-2x text-primary"></i>
                                                                                          </div>
                                                                           </div>
                                                                           <h5 class="mb-3">Sports & Gaming</h5>
                                                                           <p class="text-body mb-0">Erat ipsum justo
                                                                                          amet duo et elitr dolor, est
                                                                                          duo duo eos lorem sed diam
                                                                                          stet diam sed stet lorem.</p>
                                                            </a>
                                             </div>
                                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                                            <a class="service-item rounded" href="">
                                                                           <div
                                                                                          class="service-icon bg-transparent border rounded p-1">
                                                                                          <div
                                                                                                         class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                                                                         <i
                                                                                                                        class="fa fa-glass-cheers fa-2x text-primary"></i>
                                                                                          </div>
                                                                           </div>
                                                                           <h5 class="mb-3">Event & Party</h5>
                                                                           <p class="text-body mb-0">Erat ipsum justo
                                                                                          amet duo et elitr dolor, est
                                                                                          duo duo eos lorem sed diam
                                                                                          stet diam sed stet lorem.</p>
                                                            </a>
                                             </div>
                                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                                                            <a class="service-item rounded" href="">
                                                                           <div
                                                                                          class="service-icon bg-transparent border rounded p-1">
                                                                                          <div
                                                                                                         class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                                                                                         <i
                                                                                                                        class="fa fa-dumbbell fa-2x text-primary"></i>
                                                                                          </div>
                                                                           </div>
                                                                           <h5 class="mb-3">GYM & Yoga</h5>
                                                                           <p class="text-body mb-0">Erat ipsum justo
                                                                                          amet duo et elitr dolor, est
                                                                                          duo duo eos lorem sed diam
                                                                                          stet diam sed stet lorem.</p>
                                                            </a>
                                             </div>
                              </div>
               </div>
</div>
<!-- Service End -->
<!-- Newsletter Start -->
<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
               <div class="row justify-content-center">
                              <div class="col-lg-10 border rounded p-1">
                                             <div class="border rounded text-center p-1">
                                                            <div class="bg-white rounded text-center p-5">
                                                                           <h4 class="mb-4">{{__('messages.Subscribe to our')}} <span
                                                                                                         class="text-primary text-uppercase">{{__('messages.newsletter')}}</span>
                                                                           </h4>
                                                                           <div class="position-relative mx-auto"
                                                                                          style="max-width: 400px;">
                                                                                          <input class="form-control w-100 py-3 ps-4 pe-5"
                                                                                                         type="text"
                                                                                                         placeholder="Enter your email">
                                                                                          <button type="button"
                                                                                                         class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">{{__('messages.Submit')}}</button>
                                                                           </div>
                                                            </div>
                                             </div>
                              </div>
               </div>
</div>
<!-- Newsletter Start -->
@endsection