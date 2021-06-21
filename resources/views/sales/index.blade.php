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
        <canvas id="myAreaChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>

  <div class="col-10 offset-1">
    <table class="table table-bordered table-hover" id="schedules">
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
          <td>{{ $sale->production_month }}</td>
          <td>{{ $sale->site->costomer->name }}</td>
          <td>{{ $sale->site->name }}</td>
          <td>{{ $sale->production_cost }}</td>
          <td>{{ $sale->operating_cost }}</td>
          <td>{{ $sale->sum_cost }}</td>
          <td>
            {!! link_to_route('sales.edit', '編集', ['id' => $sale->site_id], ['class' => 'btn btn-primary']) !!}&nbsp;&nbsp;
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div><br>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/chart-area-demo.js') }}"></script>

  @endsection