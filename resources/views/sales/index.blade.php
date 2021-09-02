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
    <ul class="nav nav-tabs nav-justified mb-3">
      <li class="nav-item">
          <a href="#" class="nav-link active">
              HP事業部全体
          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
              製作費
          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
              運営費
          </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" style="font-size: 15px;">
          スポンサー手数料
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            追加作業費
        </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
            システム構築費
          </a>
      </li>
  </ul>
    <div class="card mb-4">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a href="{{ route('sales.index', []) }}" class="nav-link active">月別売り上げ</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sales.year', []) }}" class="nav-link {{ Request::routeIs('sales.year') ? 'active' : '' }}">年別売り上げ</a>
            </li>
        </ul>
    </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-12">
            {!! Form::open(['route' => ['sales.month']]) !!}

              <select class="form-control" name="year" style="width: 100px; margin: 0 0 0 auto;" onchange="submit(this.form)">
                <option selected>{{$this_year}}</option>
                @foreach ($years as $year)
                <option value="{{$year}}">{{$year}}</option>
                @endforeach
              </select>
            
              <select class="form-control" name="site" style="width: 120px; margin: 0 0 0 auto;" onchange="submit(this.form)">
                <option value="0" {{ $cos == 0 ? 'selected' : '' }}>全て</option>
                @foreach ($sites as $site)
                <option value="{{$site->id}}" {{ $site->id == $cos ? 'selected' : '' }}>{{$site->name}}</option>
                @endforeach
              </select>

            {!! Form::close() !!}
          </div>
        </div>
        <div class="col-12">&nbsp;</div>
        @if($cos != 0)
          <?php
            $sitenames = \App\Site::where('id', "$cos")->get();
          ?>
          @foreach ($sitenames as $sitename)
          <h3>{{$sitename->name}}の売り上げ</h3>
          @endforeach
          <div class="col-12">&nbsp;</div>
        @endif
        <canvas id="myBarChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>
  <div class="col-12">
    <table class="table table-bordered table-hover table-sm" id="sales">
      <thead>
        <tr>
          <th>売り上げ月</th>
          <th>顧客名</th>
          <th>サイト名</th>
          <th>製作費</th>
          <th>運営費</th>
          <th>スポンサー</th>
          <th>追加作業費</th>
          <th>システム</th>
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
          <td>-</td>
          <td>-</td>
          <td>-</td>
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