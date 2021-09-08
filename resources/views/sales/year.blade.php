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
        <a href="{{ route('sales.index', []) }}" class="nav-link {{ Request::routeIs('sales.year') ? 'active' : '' }}">HP事業部全体</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.production', []) }}" class="nav-link {{ Request::routeIs('sales.production_year') ? 'active' : '' }}">製作費</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.operating', []) }}" class="nav-link {{ Request::routeIs('sales.operating_year') ? 'active' : '' }}">運営費</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.sponser', []) }}" class="nav-link {{ Request::routeIs('sales.sponser_year') ? 'active' : '' }}" style="font-size: 15px;">スポンサー手数料</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.addition', []) }}" class="nav-link {{ Request::routeIs('sales.addition') ? 'active' : '' }} {{ Request::routeIs('sales.addition_month') ? 'active' : '' }}">追加作業費</a>
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
                @if(Request::routeIs('sales.year'))
                  <a href="{{ route('sales.index', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }}">月別売り上げ</a>
                @elseif(Request::routeIs('sales.production_year'))
                  <a href="{{ route('sales.production', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }}">月別売り上げ</a>
                @elseif(Request::routeIs('sales.operating_year'))
                  <a href="{{ route('sales.operating', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }}">月別売り上げ</a>
                @elseif(Request::routeIs('sales.sponser_year'))
                  <a href="{{ route('sales.sponser', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }}">月別売り上げ</a>
                @elseif(Request::routeIs('sales.addition_year'))
                  <a href="{{ route('sales.addition', []) }}" class="nav-link {{ Request::routeIs('sales.addition') ? 'active' : '' }}">月別売り上げ</a>
                @endif
            </li>
            <li class="nav-item">
              @if(Request::routeIs('sales.year'))
                <a href="{{ route('sales.year', []) }}" class="nav-link {{ Request::routeIs('sales.year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.production_year'))
                <a href="{{ route('sales.production_year', []) }}" class="nav-link {{ Request::routeIs('sales.production_year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.operating_year'))
                <a href="{{ route('sales.operating_year', []) }}" class="nav-link {{ Request::routeIs('sales.operating_year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.sponser_year'))
                <a href="{{ route('sales.sponser_year', []) }}" class="nav-link {{ Request::routeIs('sales.sponser_year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.addition_year'))
                <a href="{{ route('sales.addition_year', []) }}" class="nav-link {{ Request::routeIs('sales.addition_year') ? 'active' : '' }}">年別売り上げ</a>
              @endif
            </li>
        </ul>
    </div>
      <div class="card-body">
        <canvas id="myBarChart2" width="100%" height="40"></canvas>
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
          <td>
            @if($sale->site_id != null)
              {{ $sale->site->costomer->name }}
            @elseif($sale->payment_id != null)
              {{ $sale->payment->sponser->costomer->name }}
            @elseif($sale->addition_id != null)
              {{$sale->addition->site->name}}
            @endif
          </td>
          <td>
            @if($sale->site_id != null)
              {{ $sale->site->name }}
            @elseif($sale->addition_id != null)
              {{$sale->addition->site->costomer->name}}
            @else
              -
            @endif
          </td>
          <td>
            @if($sale->production_cost != null)
              {{ $sale->production_cost }}
            @else
              -
            @endif
          </td>
          <td>
            @if($sale->operating_cost != null)
              {{ $sale->operating_cost }}
            @else
              -
            @endif
          </td>
          <td>
            @if($sale->sponserc != null)
              {{ $sale->sponserc }}
            @else
              -
            @endif
          </td>
          <td>
            @if($sale->additionc != null)
              {{ $sale->additionc }}
            @else
              -
            @endif
          </td>
          <td>
            @if($sale->systemc != null)
              {{ $sale->systemc }}
            @else
              -
            @endif
          </td>
          <td>{{ $sale->sum_cost }}</td>
          <td>
            @if($sale->site_id != null)
              {!! link_to_route('sales.edit', '編集', ['id' => $sale->site_id], ['class' => 'btn btn-primary']) !!}
            @elseif($sale->payment_id != null)
              {!! link_to_route('costomers.payment', '編集', ['id' => $sale->payment->sponser_id], ['class' => 'btn btn-primary']) !!}
            @elseif($sale->addition_id != null)
              {!! link_to_route('sales.addition_index', '編集', ['id' => $sale->addition->site_id], ['class' => 'btn btn-primary']) !!}
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div><br>
  <?php
          if ($sale != null) {
              
                $varJsSales = json_encode($salesyears);
                $varJsYears = json_encode($years);
                $varJsMax = json_encode($max);
              
            }
            //var_dump($cost, $month1, $i, $counts, $sales_data, $month_data);
          ?>

  @if($sale != null)
    <script type="text/javascript">
        var sales = JSON.parse('<?php echo $varJsSales; ?>');
        var years = JSON.parse('<?php echo $varJsYears; ?>');
        var max = JSON.parse('<?php echo $varJsMax; ?>');
    </script>
  @endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/chart-bar-year.js') }}"></script>

  @endsection