@extends('layouts.master')
@section('title', 'Room '.$room->room_name.' info')
@section('content')
<div class="container-xxl py-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid " src="{{$room->photo == ' '  ? $room->photo[0]->photo :asset('/img/room-1.jpg')}}"
                alt="">
        </div>
        <div class="col-md-6">
            <h3 class="mb-3">{{ $room->room_name }}</h3>
            @for ($i = 1; $i <= 5; $i++) @if ($i <=$room->rate)
                <i class="fas fa-star text-warning"></i>
                @else
                <i class="far fa-star"></i>
                @endif
                @endfor
                <h5 class="mb-3 mt-3"> <a
                        href="https://www.google.com/maps/search/{{ urlencode($room->hotel->company->company_address ) }}"
                        target="_blank">Address: {{ $room->hotel->company->company_address }}</a>
                </h5>
                <h5 class="mb-3">Price: {{ $room->reserved->price }} $/Day</h5>
                <p class="mb-3">{{ $room->description }}</p>
                </h5>
                <a class="btn btn-primary" href="{{route('room.booking',$room->id)}}">{{__('messages.Book Now')}}</a>
        </div>
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
@push('scripts')

@endpush