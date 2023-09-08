@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<div class="row">
  <div class="col-12">
    <div class="card">
      <div id="div-error" class="alert alert-danger d-none"></div>
      <div class="card-body">
        <form method="post" class="form-horizontal" id="form-update-city">
          @csrf
          <div class="form-group">
            <label for="simpleinput">City name</label>
            <input type="text" class="form-control" name="city_name" id="city_name" value="{{$city->city_name}}">
          </div>
          <div class="form-group">
            <label for="example-fileinput">Photo</label>
            <input type="file" id="example-fileinput" class="form-control-file" name="photo">
          </div>
          <div class="form-group">
            <label for="example-select">Postal code</label>
            <input class="form-control" type="number" name="postal_code" value="{{$city->postal_code}}">
          </div>
          <div class="form-group">
            <label for="example-select">Country ID</label>
            <select class="form-control" id="select2_country" name="country_id" value="{{$city->coutry_id}}">
              <option value="{{$city->country_id}}" selected>{{$city->country_id}}</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  var path = "{{ route('select2_country') }}";
  $('#select2_country').select2({
  placeholder: 'Select an Country',
  tags: true,
  ajax: {
  url: path,
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
  return {
  results: $.map(data, function (item) {
  return {
  text: item.country_name,
  id: item.id
  }
  })
  };
  },
  cache: true
  }
  });
    $('#form-update-city').submit(function(event) {
        event.preventDefault(); // ngăn chặn gửi form trực tiếp đi
        var formData = $(this).serializeArray(); // lấy thông tin từ form
        $.ajax({
               url: '{{route('api.city.update', $city->id)}}',
               type: 'POST',
               data: formData,
               dataType: 'json',
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {
                              $('#form-update-city')[0].reset();
               toastr.success(response.message, 'Notification', {timeOut: 5000});
               setTimeout(function () {
               window.location.href = '/admin/city';
               }, 5000);
               },
               error: function(xhr) {
                              console.log(xhr.responseText);
               alert('Failed to add city!');
            }
        });
    });
</script>
@endpush