<table>

               <thead>

                              <tr>

                                             <th>Room Name</th>

                                             <th>City Name</th>
                                             <th>Price
                                             </th>

                              </tr>
               </thead>
               <tbody>
                              @foreach($rooms as $room)
                              <tr>
                                             <td>{{ $room->room_name }}</td>
                                             <td>{{$room->hotel->city->city_name}}</td>
                                             <td>{{$room->reserved->price}}</td>
                              </tr>
                              @endforeach
               </tbody>

</table>