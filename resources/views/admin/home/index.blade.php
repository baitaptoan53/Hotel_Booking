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
                36,254
              </h3>
              <p class="mb-0 text-muted">
                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i>
                  5.27%</span>
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
                <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">
                Orders
              </h5>
              <h3 class="mt-3 mb-3">
                5,543
              </h3>
              <p class="mb-0 text-muted">
                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i>
                  1.08%</span>
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
                $6,254
              </h3>
              <p class="mb-0 text-muted">
                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i>
                  7.00%</span>
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
                Growth
              </h5>
              <h3 class="mt-3 mb-3">
                +
                30.56%
              </h3>
              <p class="mb-0 text-muted">
                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i>
                  4.87%</span>
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
  <div class="row">
    <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
      <div class="card">
        <div class="card-body">

          <h4 class="header-title mt-2">Top Selling
            Products</h4>
          <div class="table-responsive">
            <table class="table table-centered table-nowrap table-hover mb-0">
              <tbody>
                <tr>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      ASOS
                      Ridley
                      High
                      Waist
                    </h5>
                    <span class="text-muted font-13">07
                      April
                      2018</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $79.49
                    </h5>
                    <span class="text-muted font-13">Price</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      82
                    </h5>
                    <span class="text-muted font-13">Quantity</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $6,518.18
                    </h5>
                    <span class="text-muted font-13">Amount</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      Marco
                      Lightweight
                      Shirt
                    </h5>
                    <span class="text-muted font-13">25
                      March
                      2018</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $128.50
                    </h5>
                    <span class="text-muted font-13">Price</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      37
                    </h5>
                    <span class="text-muted font-13">Quantity</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $4,754.50
                    </h5>
                    <span class="text-muted font-13">Amount</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      Half
                      Sleeve
                      Shirt
                    </h5>
                    <span class="text-muted font-13">17
                      March
                      2018</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $39.99
                    </h5>
                    <span class="text-muted font-13">Price</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      64
                    </h5>
                    <span class="text-muted font-13">Quantity</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $2,559.36
                    </h5>
                    <span class="text-muted font-13">Amount</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      Lightweight
                      Jacket
                    </h5>
                    <span class="text-muted font-13">12
                      March
                      2018</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $20.00
                    </h5>
                    <span class="text-muted font-13">Price</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      184
                    </h5>
                    <span class="text-muted font-13">Quantity</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $3,680.00
                    </h5>
                    <span class="text-muted font-13">Amount</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      Marco
                      Shoes
                    </h5>
                    <span class="text-muted font-13">05
                      March
                      2018</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $28.49
                    </h5>
                    <span class="text-muted font-13">Price</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      69
                    </h5>
                    <span class="text-muted font-13">Quantity</span>
                  </td>
                  <td>
                    <h5 class="font-14 my-1 font-weight-normal">
                      $1,965.81
                    </h5>
                    <span class="text-muted font-13">Amount</span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div> <!-- end table-responsive-->
        </div> <!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6 order-lg-1">
      <div class="card">
        <div class="card-body">
          <div class="dropdown float-right">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item">Sales
                Report</a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item">Export
                Report</a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item">Profit</a>
              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item">Action</a>
            </div>
          </div>
          <h4 class="header-title">Total Sales</h4>

          <div id="average-sales" class="apex-charts mb-4 mt-4" data-colors="#3688fc,#6c757d,#42d29d,#fa6767">
          </div>
          <div class="chart-widget-list">
            <p>
              <i class="mdi mdi-square text-primary"></i>
              Direct
              <span class="float-right">$300.56</span>
            </p>
            <p>
              <i class="mdi mdi-square text-danger"></i>
              Affilliate
              <span class="float-right">$135.18</span>
            </p>
            <p>
              <i class="mdi mdi-square text-success"></i>
              Sponsored
              <span class="float-right">$48.96</span>
            </p>
            <p class="mb-0">
              <i class="mdi mdi-square text-warning"></i>
              E-mail
              <span class="float-right">$154.02</span>
            </p>
          </div>
        </div> <!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col-->


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
               console.log(item.total_price);
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