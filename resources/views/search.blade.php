@extends('layouts.master')

@section('content')
<h1>Search result</h1>

<p>Finding {{ $count }} rooms:</p>

<ul>
               @foreach ($rooms as $room)
               <li>
                              {{ $room->room_name }} - {{ $room->hotel->name }} ({{ $room->hotel->city->city_name
                              }}-{{$room->reserved->price}} $/Day)
                              
               </li>
               @endforeach
</ul>
@endsection