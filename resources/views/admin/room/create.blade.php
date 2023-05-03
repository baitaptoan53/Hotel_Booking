@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div id="div-error" class="alert alert-danger d-none"></div>
      <div class="card-body">
        <form method="post" class="form-horizontal" id="form-create-room">
          @csrf
          <div class="form-group">
            <label for="simpleinput">Room name</label>
            <input type="text" class="form-control" name="room_name" id="room_name">
          </div>
          <div class="form-group">
            <label for="example-textarea">Description</label>
            <textarea class="form-control" rows="5" name="description" id="description"></textarea>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="example-select">Rate</label>
                <select class="form-control" id="rate" name="rate">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="simpleinput">Curent price</label>
                <input type="number" id="current_price" class="form-control" name="current_price">
              </div>
              <div class="col-md-6">
                <label for="simpleinput"> Price</label>
                <input type="number" id="price" class="form-control" name="price">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="example-fileinput">Photo</label>
            <input type="file" id="example-fileinput" class="form-control-file">
          </div>
          <div class="form-group">
            <label for="example-select">Hotel</label>
            <select class="form-control" id="select2_hotel" name="hotel_id">
            </select>
          </div>
          <div class="form-group">
            <label for="example-select">Room type</label>
            <select class="form-control" id="select2_room_type" name="room_type_id">
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="div_error"></div>
@endsection
@push('scripts')

<script type="text/javascript">
  var path = "{{ route('select2_hotel') }}";
  var path_2 = "{{ route('select2_room_type') }}";

$('#select2_hotel').select2({
                   placeholder: 'Select an Hotel',
                   tags: true,
                   ajax: {
                     url: path,
                     dataType: 'json',
                     delay: 250,
                     processResults: function (data) {
                       return {
                         results:  $.map(data, function (item) {
                               return {
                                   text: item.hotel_name,
                                   id: item.id
                               }
                           })
                       };
                     },
                     cache: true
                   }
                 });

                 $('#select2_room_type').select2({
                   placeholder: 'Select an Room type',
                   tags: true,
                   ajax: {
                     url: path_2,
                     dataType: 'json',
                     delay: 250,
                     processResults: function (data_2) {
                       return {
                         results:  $.map(data_2, function (item_2) {
                               return {
                                   text: item_2.room_type_name,
                                   id: item_2.id
                               }
                           })
                       };
                     },
                     cache: true
                   }
                 });
                 $(document).ready(function() {
           
    $('#form-create-room').submit(function(event) {
        event.preventDefault(); // ngăn chặn gửi form trực tiếp đi
        var formData = $(this).serializeArray(); // lấy thông tin từ form
        $.ajax({
            url: '{{route('api.room.store')}}',
            type: 'POST',
            data: formData,
            dataType: 'json',
            headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
            success: function(response) {
                  $('#form-create-room')[0].reset();
                  // hiend thi thong bao thanh cong bang toastr
                  toastr.success('Add room success!');
                  // location.reload(); ve lai trang room.index
                  window.location.href = '{{route('admin.room.index')}}';
            },
            error: function(xhr) {
              
              console.log(xhr.responseText);
      alert('Failed to add room!');
            }
        });
    });
});

</script>
@endpush