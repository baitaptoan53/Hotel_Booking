@extends('layouts.master')
@section('title', 'Booking')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">{{__('messages.home')}}</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
@include('layouts.search')


<!-- Booking Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
            <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg"
                            style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form class="needs-validation" action="{{route('room.booking.store',$room->id)}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ Auth::user()->phone }}">
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <div class="form-floating ">
                                    <select class="form-control" name="city" id='select-city'></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>District</label>
                                <div class="form-floating ">
                                    <select class="form-control" name="district" id='select-district'></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" id="checkin"
                                        placeholder="Check In" data-target="#date3" data-toggle="datetimepicker"
                                        name="start_date" />
                                    <label for="checkin">Check In</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" id="checkout"
                                        placeholder="Check Out" data-target="#date4" data-toggle="datetimepicker"
                                        name="end_date" />
                                    <label for="checkout">Check Out</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">{{__('messages.Book Now')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->
<!-- Newsletter Start -->
<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
        <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-1">
                <div class="bg-white rounded text-center p-5">
                    <h4 class="mb-4">{{__('messages.Subscribe to our')}} <span class="text-primary text-uppercase">{{__('messages.newsletter')}}</span></h4>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
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

@push('scripts')
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
  
    $('#search').select2({
        placeholder: '{{__('messages.Select an city')}}',
        tags: true,
        ajax: {
          url: path,
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.city_name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });
      async function loadDistrict() {
            $('#select-district').empty();
            const path = $("#select-city option:selected").data('path');
            const response = await fetch('{{ asset('locations/') }}' + path);
            const districts = await response.json();
            $.each(districts.district, function(index, each) {
                if (each.pre === 'Quận') {
                    $("#select-district").append(`
                    <option>
                        ${each.name}
                    </option>`);
                }
            })
        }
        $(document).ready(async function() {
            $("#select-city").select2();
            const response = await fetch('{{ asset('locations/index.json') }}');
            const cities = await response.json();
            $.each(cities, function(index, each) {
                $("#select-city").append(`
                <option data-path='${each.file_path}'>
                    ${index}
                </option>`)
            })
            $("#select-city").change(function() {
                loadDistrict();
            });
            $('#select-district').select2();
            loadDistrict();
        });
</script>
@endpush