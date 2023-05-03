@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    $(document).ready(function() {
    var currentPage = 1;

    function getUsers(page) {
        $.ajax({
            url: '/api/users?page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var users = response.data;
                var total = response.meta.total;
                var perPage = response.meta.per_page;
                var currentPage = response.meta.current_page;

                // Hiển thị danh sách Users
                var tableHtml = '<table>';
            tableHtml += '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Role</th><th>Created at</th><th>Delete</th></tr>';
                $.each(users, function(index, user) {
                    let created_at = convertDateToDateTime(user.created_at);
                tableHtml += '<tr>';
                tableHtml += '<td>' + user.id + '</td>';
                tableHtml += '<td>' + user.name + '</td>';
                tableHtml += '<td>' + user.email + '</td>';
                tableHtml += '<td>' + user.phone + '</td>';
                tableHtml += '<td>' + user.address + '</td>';
                tableHtml += '<td>' + user.role + '</td>';
                tableHtml += '<td>' + created_at + '</td>';
                tableHtml += '<td><button class="btn btn-danger" id="delete_user" data-id="' + user.id + '">Delete</button></td>';
                tableHtml += '</tr>';
                });
                tableHtml += '</table>';
                $('#table-data').html(tableHtml);
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
        getUsers(page);
});
            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    getUsers(currentPage);
});
$(document).on('click', '#delete_user', function() {
    var id = $(this).data('id');
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: '{{ route('api.users') }}' + '/' + id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function(response) {
            toastr.success('Delete user success!', 'Success', {timeOut: 5000});
            location.reload();
        },
        error: function(response) {
            console.log(response);
        }
    });
});
</script>
@endpush