@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <form class="form-inline">
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control form-control-light" id="dash-daterange">
                <div class="input-group-append">
                  <span class="input-group-text bg-success border-success text-white">
                    <i class="mdi mdi-calendar-range font-13"></i>
                  </span>
                </div>
              </div>
            </div>
            <a href="javascript: void(0);" class="btn btn-success ml-2">
              <i class="mdi mdi-autorenew"></i>
            </a>
          </form>
        </div>
        <h4 class="page-title">Dashboard</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->

  <div class="row">
    <div class="col-xl-5 col-lg-6">

      <div class="row">
        <div class="col-lg-6">
          <div class="card widget-flat">
            <div class="card-body">
              <div class="float-right">
                <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">
                Customers
              </h5>
              <h3 class="mt-3 mb-3">
                {{$users}}
              </h3>
              <p class="mb-0 text-muted">
                @if ($calc_users > 0 && $users_last_month> 0)
                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i>
                  {{ round(($users / $users_last_month) * 100) }}%
                </span>
                {{-- @else
                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i>
                  {{ round(($users / $users_last_month) * 100) }}%
                </span> --}}
                @endif
                <span class="text-nowrap">
                  Since
                  last
                  month</span>
              </p>
            </div> <!-- end card-body-->
          </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
          <div class="card widget-flat">
            <div class="card-body">
              <div class="float-right">
                <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">
                Orders
              </h5>
              <h3 class="mt-3 mb-3">
                {{$room_booking}}
              </h3>
              <p class="mb-0 text-muted">
                @if ($calc_room_booking > 0 && $room_booking_last_month > 0  )
                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i>
                  {{ round(($room_booking / $room_booking_last_month) * 100) }}%
                </span>
                {{-- @else
                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i>
                  {{ round(($room_booking / $room_booking_last_month) * 100) }}%
                </span> --}}
                @endif
                <span class="text-nowrap">Since
                  last
                  month</span>
              </p>
            </div> <!-- end card-body-->
          </div> <!-- end card-->
        </div> <!-- end col-->
      </div> <!-- end row -->

      <div class="row">
        <div class="col-lg-6">
          <div class="card widget-flat">
            <div class="card-body">
              <div class="float-right">
                <i class="mdi mdi-currency-usd widget-icon bg-info-lighten text-info"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">
                Revenue
              </h5>
              <h3 class="mt-3 mb-3">
                 @if ($total_price >= 1000000000) 
                 {{number_format($total_price / 1000000000, 2) . 'B';}}
                 @elseif ($total_price >= 1000000) 
                 {{number_format($total_price / 1000000, 2) . 'M';}}
                 @else 
                 {{number_format($total_price, 2);}}
                @endif
              </h3>
              <p class="mb-0 text-muted">
                @if ($calc_total_price > 0 && $total_price_last_month > 0)
                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i>
                  {{ round(($total_price / $total_price_last_month) * 100) }}%
                </span>
                {{-- @else
                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i>
                  {{ round(($total_price / $total_price_last_month) * 100) }}%
                </span> --}}
                @endif
                <span class="text-nowrap">Since
                  last
                  month</span>
              </p>
            </div> <!-- end card-body-->
          </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-6">
          <div class="card widget-flat">
            <div class="card-body">
              <div class="float-right">
                <i class="mdi mdi-pulse widget-icon bg-warning-lighten text-warning"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Growth">
                Room
              </h5>
              <h3 class="mt-3 mb-3">
                {{$total_room}}
              </h3>
              <p class="mb-0 text-muted">
                @if ($calc_total_room > 0)
                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i>
                  {{-- {{ round(($total_room / $total_room_last_month) * 100) }}% --}}
                </span>
                @else
                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i>
                  {{-- {{ round(($total_room / $total_room_last_month) * 100) }}% --}}
                </span>
                @endif
                <span class="text-nowrap">Since
                  last
                  month</span>
              </p>
            </div> <!-- end card-body-->
          </div> <!-- end card-->
        </div> <!-- end col-->
      </div> <!-- end row -->
    </div> <!-- end col -->
    <div class="col-xl-7  col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="dropdown float-right">
          </div>
          <h4 class="header-title mb-3">Projections Vs
            Actuals</h4>
          <div id="high-performing-product" class="apex-charts" data-colors="#fa6767,#e3eaef">
          </div>
          <div style="height: 263px;" class="chartjs-chart">
            <canvas id="myChart"></canvas>
          </div>
        </div> <!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col -->
  </div>
  <!-- end row -->
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $.ajax({
  url: '/api/booking', // Đường dẫn đến API của bạn
  dataType: 'json',
  success: function(data) {
    // Dữ liệu được lấy về thành công, tạo biểu đồ
    createChart(data.data);
  }
});
  function createChart(data) {
  // Lấy các giá trị check_in và total_price từ dữ liệu
  var labels = data.data.map(function(item) {
    return item.check_in;
  });

  var values = data.data.map(function(item) {
    return item.total_price;
  });

  // Tạo biểu đồ bằng Chart.js
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Total Price',
        data: values,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
}
</script>
@endpush