@extends('layouts.master')

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
                <a class="btn btn-primary" href="{{route('room.booking',$room->id)}}">Đặt phòng
                    ngay</a>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush