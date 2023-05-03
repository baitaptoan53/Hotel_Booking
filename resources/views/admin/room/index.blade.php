@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.room.create') }}" class="btn btn-primary">
                    Create
                </a>
                <nav class="float-right">
                    <ul class="pagination pagination-rounded mb-0" id="pagination">
                    </ul>
                </nav>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table-data">

                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
    $.ajax({
        url: '{{ route('api.room') }}',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var rooms = response.data;
            var tableHtml = '<table>';
            tableHtml += '<tr><th>ID</th><th>Room name</th><th>Description</th><th>Address</th><th>Price</th><th>Rating</th><th>Photo</th><th>Created at</th><th>Update at</th></tr>';
            $.each(rooms, function( index,room) {
               let created_at = convertDateToDateTime(room.created_at);
               let updated_at = convertDateToDateTime(room.updated_at);
               if(room.description.length > 100) {
                   room.description = room.description.substr(0, 100) + '...';
               }
                tableHtml += '<tr>';
                tableHtml += '<td>' + room.id + '</td>';
                tableHtml += '<td>' + room.room_name + '</td>';
                tableHtml += '<td>' + room.description + '</td>';
                tableHtml += '<td>' + room.address + '</td>';
                tableHtml += '<td>' + room.price + '</td>';
                tableHtml += '<td>' + room.rate + '</td>';
                              tableHtml += '<td>' + room.photo + '</td>';
                tableHtml += '<td>' + created_at + '</td>';
                              tableHtml += '<td>' + updated_at + '</td>';
                tableHtml += '</tr>';
            });
            tableHtml += '</table>';
            $('#table-data').html(tableHtml);
        },
        error: function(response) {
            console.log(response);
        }
    });
});


</script>
@endpush