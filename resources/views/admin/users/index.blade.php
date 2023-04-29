@extends('admin.layouts.master')
@section('content')
<div class="row">
               <div class="col-12">
                              <div class="card">
                                             <div class="card-header">


                                                            <input type="file" name="csv" id="csv" class="d-none"
                                                                           accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                            <nav class="float-right">
                                                                           <ul class="pagination pagination-rounded mb-0"
                                                                                          id="pagination">
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
        url: '{{ route('api.users') }}',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var users = response.data;
            var tableHtml = '<table>';
            tableHtml += '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Role</th><th>Created at</th></tr>';
            $.each(users, function( index,user) {
               let created_at = convertDateToDateTime(user.created_at);
                tableHtml += '<tr>';
                tableHtml += '<td>' + user.id + '</td>';
                tableHtml += '<td>' + user.name + '</td>';
                tableHtml += '<td>' + user.email + '</td>';
                tableHtml += '<td>' + user.phone + '</td>';
                tableHtml += '<td>' + user.address + '</td>';
                tableHtml += '<td>' + user.role + '</td>';
                tableHtml += '<td>' + created_at + '</td>';
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