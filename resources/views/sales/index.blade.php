@extends('layouts.app')

@section('content')
<h1 class="mt-4">売り上げ管理</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Sales</li>
</ol>
<div class="row align-items-center">

  @include('commons.error_messages')
  <?php 
  $i = 0;
  $counts = count($sales);
   ?>

  <div class="col-10 offset-1">
    <div class="card mb-4">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a href="{{ route('sales.index', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }}">月別売り上げ</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sales.year', []) }}" class="nav-link {{ Request::routeIs('sales.year') ? 'active' : '' }}">年別売り上げ</a>
            </li>
        </ul>
    </div>
      <div class="card-body">
        {!! Form::open(['route' => ['sales.month']]) !!}
          <select class="form-control" name="year" style="width: 100px; margin: 0 0 0 auto;"  onchange="submit(this.form)">
            <option selected>{{$this_year}}</option>
            @foreach ($years as $year)
            <option value="{{$year}}">{{$year}}</option>
            @endforeach
          </select>
          {!! Form::close() !!}
        <div class="col-12">&nbsp;</div>
        <canvas id="myBarChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>
  <div class="col-10 offset-1">
    <table class="table table-bordered table-hover" id="sales">
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
          <td>{{ $sale->month }}</td>
          <td>{{ $sale->site->costomer->name }}</td>
          <td>{{ $sale->site->name }}</td>
          <td>{{ $sale->production_cost }}</td>
          <td>{{ $sale->operating_cost }}</td>
          <td>{{ $sale->sum_cost }}</td>
          <td>
            {!! link_to_route('sales.edit', '編集', ['id' => $sale->site_id], ['class' => 'btn btn-primary']) !!}&nbsp;&nbsp;
          </td>
        </tr>
        <?php
          if ($sales != null) {
            if(count($sales) == 1){
              $sales_data[] = $sale->sum_cost;
              $month_data[] = $sale->month;
              $varJsSales = json_encode($sales_data);
              $varJsMonth = json_encode($month_data);
              $max = $sale->sum_cost;
            } else {
              if($i == 0)
              {
                $month1 = $sale->month;
                $month2 = null;
                $sales_data = array();
                $month_data = array();
                $cost2 = 0;
                $cost = $sale->sum_cost;
                $max = $sale->sum_cost;
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
                  $cost = $cost2;
                  $month1 = $month2;
                }

                if($i == $counts){
                  $sales_data[] = $cost;
                  $month_data[] = $month1;
                }

                if($max < $cost){
                  $max = $cost;
                }
                
                if(count($sales_data) > 1){
                  $varJsSales = json_encode($sales_data);
                  $varJsMonth = json_encode($month_data);
                }
              }
              //var_dump($cost, $month1, $i, $counts, $sales_data, $month_data);
            }
            
          }
          ?>
        @endforeach
      </tbody>
    </table>
  </div><br>

  @if($sales != null && $i > 1 || count($sales) == 1)
    <script type="text/javascript">
        var sales = JSON.parse('<?php echo $varJsSales; ?>');
        var months = JSON.parse('<?php echo $varJsMonth; ?>');
        var max = JSON.parse('<?php echo $max; ?>');
    </script>
  @endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/chart-bar-demo.js') }}"></script>

  @endsection