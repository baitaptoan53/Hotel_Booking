@extends('layouts.master')
@section('title', 'About')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
               <div class="container-fluid page-header-inner py-5">
                              <div class="container text-center pb-5">
                                             <h1 class="display-3 text-white mb-3 animated slideInDown">
                                                            {{__('messages.services')}}</h1>
                                             <nav aria-label="breadcrumb">
                                                            <ol
                                                                           class="breadcrumb justify-content-center text-uppercase">
                                                                           <li class="breadcrumb-item"><a
                                                                                                         href="{{route('home.index')}}">{{__('messages.home')}}</a>
                                                                           </li>
                                                                           <li class="breadcrumb-item text-white active"
                                                                                          aria-current="page">About
                                                                           </li>
                                                            </ol>
                                             </nav>
                              </div>
               </div>
</div>
<!-- Page Header End -->
@include('layouts.search')
<!-- About Start -->
<div class="container-xxl py-5">
               <div class="container">
                              <div class="row g-5 align-items-center">
                                             <div class="col-lg-6">
                                                            <h6
                                                                           class="section-title text-start text-primary text-uppercase">
                                                                           {{__('messages.ABOUT US')}}</h6>
                                                            <h1 class="mb-4">{{__('messages.Welcome')}} <span
                                                                                          class="text-primary text-uppercase">Hotelier</span>
                                                            </h1>
                                                            <p class="mb-4">{{__('messages.welcome to hotelier des')}}
                                                            </p>
                                                            <div class="row g-3 pb-4">
                                                                           <div class="col-sm-4 wow fadeIn"
                                                                                          data-wow-delay="0.1s">
                                                                                          <div
                                                                                                         class="border rounded p-1">
                                                                                                         <div
                                                                                                                        class="border rounded text-center p-4">
                                                                                                                        <i
                                                                                                                                       class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                                                                                                        <h2 class="mb-1"
                                                                                                                                       data-toggle="counter-up">
                                                                                                                                       1234
                                                                                                                        </h2>
                                                                                                                        <p
                                                                                                                                       class="mb-0">
                                                                                                                                       {{__('messages.room')}}
                                                                                                                        </p>
                                                                                                         </div>
                                                                                          </div>
                                                                           </div>
                                                                           <div class="col-sm-4 wow fadeIn"
                                                                                          data-wow-delay="0.3s">
                                                                                          <div
                                                                                                         class="border rounded p-1">
                                                                                                         <div
                                                                                                                        class="border rounded text-center p-4">
                                                                                                                        <i
                                                                                                                                       class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                                                                                                        <h2 class="mb-1"
                                                                                                                                       data-toggle="counter-up">
                                                                                                                                       1234
                                                                                                                        </h2>
                                                                                                                        <p
                                                                                                                                       class="mb-0">
                                                                                                                                       {{__('messages.Staff')}}        
                                                                                                                        </p>
                                                                                                         </div>
                                                                                          </div>
                                                                           </div>
                                                                           <div class="col-sm-4 wow fadeIn"
                                                                                          data-wow-delay="0.5s">
                                                                                          <div
                                                                                                         class="border rounded p-1">
                                                                                                         <div
                                                                                                                        class="border rounded text-center p-4">
                                                                                                                        <i
                                                                                                                                       class="fa fa-users fa-2x text-primary mb-2"></i>
                                                                                                                        <h2 class="mb-1"
                                                                                                                                       data-toggle="counter-up">
                                                                                                                                       1234
                                                                                                                        </h2>
                                                                                                                        <p
                                                                                                                                       class="mb-0">
                                                                                                                                       {{__('messages.Clients')}}   
                                                                                                                        </p>
                                                                                                         </div>
                                                                                          </div>
                                                                           </div>
                                                            </div>
                                                            <a class="btn btn-primary py-3 px-5 mt-2"
                                                                           href="">{{__('messages.EXPLORE MORE')}}</a>
                                             </div>
                                             <div class="col-lg-6">
                                                            <div class="row g-3">
                                                                           <div class="col-6 text-end">
                                                                                          <img class="img-fluid rounded w-75 wow zoomIn"
                                                                                                         data-wow-delay="0.1s"
                                                                                                         src="img/about-1.jpg"
                                                                                                         style="margin-top: 25%;">
                                                                           </div>
                                                                           <div class="col-6 text-start">
                                                                                          <img class="img-fluid rounded w-100 wow zoomIn"
                                                                                                         data-wow-delay="0.3s"
                                                                                                         src="img/about-2.jpg">
                                                                           </div>
                                                                           <div class="col-6 text-end">
                                                                                          <img class="img-fluid rounded w-50 wow zoomIn"
                                                                                                         data-wow-delay="0.5s"
                                                                                                         src="img/about-3.jpg">
                                                                           </div>
                                                                           <div class="col-6 text-start">
                                                                                          <img class="img-fluid rounded w-75 wow zoomIn"
                                                                                                         data-wow-delay="0.7s"
                                                                                                         src="img/about-4.jpg">
                                                                           </div>
                                                            </div>
                                             </div>
                              </div>
               </div>
</div>
<!-- About End -->
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