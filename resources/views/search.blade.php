@extends('layouts.master')
@section('title', 'Search')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">{{__('messages.OUR ROOMS')}}</h6>
            <h1 class="mb-5">{{__('messages.EXPLORE')}} <span class="text-primary text-uppercase">{{__('messages.room')}}</span></h1>
        </div>
        <div class="row g-4">
            @foreach($rooms as $room)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{$room->photo == ' '  ? $room->photo[0]->photo : asset('img/room-1.jpg')
                            }}" alt="">
                        <small
                            class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{number_format($room->reserved->price)}}
                            $/Day</small>
                        </small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">{{$room->room_name}}</h5>
                            <div class="ps-2">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$room->rate)
                                    <i class="fas fa-star text-warning"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                            <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2
                                Bath</small>
                            <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                        </div>
                        <p class="text-body mb-3">{{
                            strlen($room->description) > 150 ? substr($room->description, 0, 100) . '...' :
                            $room->description
                            }}</p>
                        <p class="text-body mb-3">
                            {{$room->hotel->company->company_address}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                href="{{route('room.show', $room->id)}}">View Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                href="{{route('room.booking',$room->id)}}">{{__('messages.Book Now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex mt-3">
        {!! $rooms->links() !!}
    </div>

</div>
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