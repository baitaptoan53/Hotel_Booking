@extends('layouts.master')

@section('content')
<div class="container-xxl py-5 mb-5">
               <div class="row">
                              <div class="col-md-6">
                                             <img class="img-fluid "
                                                            src="{{$room->photo == ' '  ? $room->photo[0]->photo :asset('/img/room-1.jpg')}}"
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
                                                            <h5 class="mb-3 mt-3"><a href="#" class="hotel-address"
                                                                                          data-address="{{ $room->hotel->company->company_address }}">Address: {{
                                                                                          $room->hotel->company->company_address
                                                                                          }}</a></h5>
                                                            <h5 class="mb-3">Price: {{ $room->reserved->price }} $/Day</h5>
                                                            <p class="mb-3">{{ $room->description }}</p>
                                                            </h5>
                                                            <button class="btn btn-primary">Đặt phòng ngay</button>
                              </div>
               </div>
</div>

@endsection
@push('scripts')
<script>
               var hotelAddressLinks = document.querySelectorAll('.hotel-address');
               hotelAddressLinks.forEach(function(link) {
                   link.addEventListener('click', function(event) {
                       event.preventDefault();
                       var address = event.target.dataset.address;
                       window.open('https://www.google.com/maps/place/' + address, '_blank');
                   });
               });
</script>
@endpush