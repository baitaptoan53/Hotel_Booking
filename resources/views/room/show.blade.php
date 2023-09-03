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

<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                @foreach ($comments as $comment)
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info">
                        @if ($comment->user->photo == null)
                        <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                        @else
                        <img class="rounded-circle" src="{{asset('/storage/'.$comment->user->photo)}}" width="40">
                        @endif
                        <div class="d-flex flex-column justify-content-start ml-2"><span
                                class="d-block font-weight-bold name">{{$comment->user->name}}</span><span
                                class="date text-black-50">{{ $comment->created_at->diffForHumans() }}</span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">{{$comment->content}}</p>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span>
                        </div>
                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span>
                        </div>
                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="bg-light p-2">

    @if( Auth::check())
    @if (Auth::user()->photo == null)
    <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
    @else
    <img class="rounded-circle" src="{{asset('/storage/'.$comment->user->photo)}}" width="40">
    @endif
    {{ Auth::user()->name }}
    @endif
    <div class="row mt-3">
        @if (Auth::check())
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">{{__('messages.comment')}}</button>
        </form>
        @else
        <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment.</p>
        @endif
    </div>
</div>
<!-- Newsletter Start -->
<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
        <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-1">
                <div class="bg-white rounded text-center p-5">
                    <h4 class="mb-4">{{__('messages.Subscribe to our')}} <span
                            class="text-primary text-uppercase">{{__('messages.newsletter')}}</span></h4>
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