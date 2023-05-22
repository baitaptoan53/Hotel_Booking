@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-header">
                <a href="{{ route('admin.room.create') }}" class="btn btn-primary">
                    Create
                </a>
                <a href="{{route('admin.room.export')}}" class="btn btn-primary">Export</a>
                {{-- <input type="file" name="file" id="import_file" accept=".xlsx" href={{'admin.room.import'}} /> --}}
                <form action="{{route('admin.room.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="import_file" accept=".xlsx" />
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
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
<div id="pagination"></div>
@endsection
@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        var currentPage = 1;
        function getRooms(page){
            $.ajax({
        url: '/api/room?page=' + page,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var rooms = response.data.data;
            var total = response.data.meta.total;
            var perPage = response.data.meta.per_page;
            var currentPage = response.data.meta.current_page;
            var tableHtml = '<table>';
                tableHtml+= '<tr><th>ID</th><th>Room name</th><th>Description</th><th>Address</th><th>Price</th><th>Rating</th><th>Photo</th><th>Created at</th><th>Update at</th><th>Edit</th></th></tr>';
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
                tableHtml += '<td><a href="/admin/room/' + room.id + '/edit" class="btn btn-primary">Edit</a></td>';
                tableHtml += '</tr>';
            });
            tableHtml += '</table>';
            $("#table-data").html(tableHtml);
            var paginationHtml = '';
                paginationHtml += '<ul class="pagination">';
                if (currentPage > 1) {
                    paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>';
                }
                for (var i = 1; i <= Math.ceil(total / perPage); i++) {
                    if (i == currentPage) {
                        paginationHtml += '<li class="page-item active"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
                    } else {
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
                    }
                }
                if (currentPage < Math.ceil(total / perPage)) {
                    paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>';
                }
                paginationHtml += '</ul>';
                $('#pagination').html(paginationHtml);

        $('#pagination').on('click', 'a.page-link', function(event) {
        event.preventDefault();
        var page = $(this).data('page');
        getRooms(page);
});
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    getRooms(currentPage);
});
</script>
@endpush