@extends('layouts.app')

@section('content')
<h1 class="mt-4">売り上げ管理</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Sales</li>
</ol>
<div class="row align-items-center">

  @include('commons.error_messages')

  <div class="col-10 offset-1">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-chart-area mr-1"></i>
        売り上げ表
      </div>
      <div class="card-body">
<<<<<<< HEAD
        <canvas id="myBarChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>
  <div class="col-10 offset-1">
    <table class="table table-bordered table-hover" id="sales">
=======
        <canvas id="myAreaChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>

  <div class="col-10 offset-1">
    <table class="table table-bordered table-hover" id="schedules">
>>>>>>> 3dde02f52e6cdaf56045571b8234863252a60a1e
      <thead>
        <tr>
          <th>売り上げ月</th>
          <th>顧客名</th>
          <th>サイト名</th>
          <th>製作費</th>
          <th>運営費</th>
          <th>売り上げ金額</th>
          <th>編集</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach($sales as $sale)
        <tr>
<<<<<<< HEAD
          <td>{{ $sale->month }}</td>
          <td>{{ $sale->costomer_name }}</td>
          <td>{{ $sale->site_name }}</td>
=======
          <td>{{ $sale->production_month }}</td>
          <td>{{ $sale->site->costomer->name }}</td>
          <td>{{ $sale->site->name }}</td>
>>>>>>> 3dde02f52e6cdaf56045571b8234863252a60a1e
          <td>{{ $sale->production_cost }}</td>
          <td>{{ $sale->operating_cost }}</td>
          <td>{{ $sale->sum_cost }}</td>
          <td>
            {!! link_to_route('sales.edit', '編集', ['id' => $sale->site_id], ['class' => 'btn btn-primary']) !!}&nbsp;&nbsp;
          </td>
        </tr>
<<<<<<< HEAD
        <?php
          if ($sales != null) {
            if($i == 0)
            {
              $month1 = $sale->month;
              $month2 = null;
              $varJsSales = null;
              $varJsMonth = null;
              $cost2 = 0;
              $cost = $sale->sum_cost;
              $i++;
            } else {
              $month2 = $sale->month;
              $m[] = $sale->month;
              $cost2 = $sale->sum_cost;
              $i++;
            }

            if($i > 1){
              if($month1 == $month2){
                $cost = $cost + $cost2;
              } else {
                $sales_data[] = $cost;
                $month_data[] = $month1;
                $month1 = $month2;
                $cost = $cost2;
              }

              if($i == $counts){
                $sales_data[] = $cost;
                $month_data[] = $month1;
              }
              $varJsSales = json_encode($sales_data);
              $varJsMonth = json_encode($month_data);
            }
            
          }
          ?>
=======
>>>>>>> 3dde02f52e6cdaf56045571b8234863252a60a1e
        @endforeach
      </tbody>
    </table>
  </div><br>

<<<<<<< HEAD
  @if($sales != null && $varJsSales != null)
    <script type="text/javascript">
        var sales = JSON.parse('<?php echo $varJsSales; ?>');
        var months = JSON.parse('<?php echo $varJsMonth; ?>');
    </script>
  @endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/chart-bar-demo.js') }}"></script>
=======
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/chart-area-demo.js') }}"></script>
>>>>>>> 3dde02f52e6cdaf56045571b8234863252a60a1e

  @endsection