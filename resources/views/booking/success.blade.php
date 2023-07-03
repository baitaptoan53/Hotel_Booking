@extends('layouts.master')
@section('title', 'Booking Success')
@section('content')

{{-- hiển thị nội dung phòng vừa đặt --}}
<div class="container mt-5 mb-5">
               <div class="card">
                              <div class="card-header">
                                             <h3>{{__('messages.Booking Successful')}}
                                             </h3>
                              </div>
                              <div class="card-body">
                                             <h4>{{__('messages.Your Booking Details')}}:</h4>
                                             <p><strong>{{__('messages.Room ID')}}:</strong> {{ $roomId }}</p>
                                             <p><strong>{{__('messages.Start Date')}}</strong> {{ $startDate }}</p>
                                             <p><strong>{{__('messages.End Date')}}End Date:</strong> {{ $endDate }}</p>
                                             <p><strong>{{__('messages.Total Price')}}Total Price: </strong> {{ $price }}$</p>
                              </div>
               </div>
</div>
@endsection