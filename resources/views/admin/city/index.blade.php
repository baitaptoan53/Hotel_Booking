@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.city.create') }}" class="btn btn-primary">
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

    function getcities(page) {
        $.ajax({
            url:'/api/city?page=' + page,
            dataType: "json",
            type: 'GET',
            success: function(response) {
                var cities = response.data.data;
                var total = response.data.meta.total;
                var perPage = response.data.meta.per_page;
                var currentPage = response.data.meta.current_page;
                var tableHtml = '<table>';
                tableHtml+= '<tr><th>ID</th><th>City name</th><th>Postal code</th><th>Country id</th><th>Create at</th><th>Update at</th><th>Photo</th><th>Edit</th></tr>';
                $.each(cities, function(index, city) {
                    let photo;
                    if(city.photo == null){
                        photo = 'No photo';
                    }
                    else if(city.photo != null){
                        let photo = '{{asset('storage/')}}' + '/' + city.photo;
                    }
                    tableHtml += '<tr>';
                    tableHtml += '<td>' + city.id + '</td>';
                    tableHtml += '<td>' + city.city_name + '</td>';
                    tableHtml += '<td>' + city.postal_code + '</td>';
                    tableHtml += '<td>' + city.country_id + '</td>';
                    tableHtml += '<td>' + city.created_at + '</td>';
                    tableHtml += '<td>' + city.updated_at + '</td>';
                    tableHtml += '<td>' + photo + '</td>';
                    tableHtml += '<td><a href="/admin/city/' + city.id + '/edit" class="btn btn-primary">Edit</a></td>';
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
        getcities(page);
});
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    getcities(currentPage);
});
</script>

@endpush