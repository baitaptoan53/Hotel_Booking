@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <input type="file" name="csv" id="csv" class="d-none"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                {{-- <nav class="float-right">
                    <ul class="pagination pagination-rounded mb-0" id="pagination">
                    </ul>
                </nav> --}}
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="card-body">
                <table class="table table-striped" id="table-data">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Check in</th>
                            <th>Check out</th>
                            <th>Total price</th>
                            <th>Users id</th>
                            <th>Room name</th>
                            <th>Room id</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
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

    function getbookings(page) {
        $.ajax({
            url:'{{ route('api.booking') }}',
            dataType: "json",
            type: 'GET',
            success: function(response) {
                var bookings = response.data.data;
                var total = response.data.meta.total;
                var perPage = response.data.meta.per_page;
                var currentPage = response.data.meta.current_page;
                // Hiển thị danh sách bookings
                $.each(bookings, function(index, booking) {
                    let check_in = convertDateToDateTime(booking.check_in);
                    let check_out = convertDateToDateTime(booking.check_out);
                    //nếu mà ngày check out nhỏ hơn ngày hiện tại thì sẽ hiển thị status xanh avilable
                    if (check_out < new Date()) {
                        var status = '<span class="badge badge-success">Available</span>';
                    } else {
                        var status = '<span class="badge badge-danger">Booked</span>';
                    }
                     var tableHtml = '<tr>';
                    tableHtml += '<td>' + booking.id + '</td>';
                    tableHtml += '<td>' + booking.check_in + '</td>';
                    tableHtml += '<td>' + booking.check_out + '</td>';
                    tableHtml += '<td>' + booking.total_price + '</td>';
                    tableHtml += '<td>' + booking.users_id + '</td>';
                    tableHtml += '<td>' + booking.room_name + '</td>';
                    tableHtml += '<td>' + booking.room_id + '</td>';
                    tableHtml += '<td>' + status + '</td>';
                    tableHtml += '</tr>';
                    $("#table-data").append(tableHtml);
                });

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
// Lắng nghe sự kiện click trên các link đường dẫn
        $('#pagination').on('click', 'a.page-link', function(event) {
        event.preventDefault();
        var page = $(this).data('page');
        getbookings(page);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
    getbookings(currentPage);
    });
</script>

@endpush