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
  ?>

  <div class="col-10 offset-1">
    <ul class="nav nav-tabs nav-justified mb-3">
      <li class="nav-item">
        <a href="{{ route('sales.index', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }} {{ Request::routeIs('sales.month') ? 'active' : '' }}">HP事業部全体</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.production', []) }}" class="nav-link {{ Request::routeIs('sales.production') ? 'active' : '' }} {{ Request::routeIs('sales.production_month') ? 'active' : '' }}">製作費</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.operating', []) }}" class="nav-link {{ Request::routeIs('sales.operating') ? 'active' : '' }} {{ Request::routeIs('sales.operating_month') ? 'active' : '' }}">運営費</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('sales.sponser', []) }}" class="nav-link {{ Request::routeIs('sales.sponser') ? 'active' : '' }} {{ Request::routeIs('sales.sponser_month') ? 'active' : '' }}" style="font-size: 15px;">スポンサー手数料</a>
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
              @if(Request::routeIs('sales.index')|| Request::routeIs('sales.month'))
                <a href="{{ route('sales.index', []) }}" class="nav-link {{ Request::routeIs('sales.index') ? 'active' : '' }}">月別売り上げ</a>
              @elseif(Request::routeIs('sales.production') || Request::routeIs('sales.production_month'))
                <a href="{{ route('sales.production', []) }}" class="nav-link {{ Request::routeIs('sales.production') ? 'active' : '' }}">月別売り上げ</a>
              @elseif(Request::routeIs('sales.operating') || Request::routeIs('sales.operating_month'))
                <a href="{{ route('sales.operating', []) }}" class="nav-link {{ Request::routeIs('sales.operating') ? 'active' : '' }}">月別売り上げ</a>
              @elseif(Request::routeIs('sales.sponser') || Request::routeIs('sales.sponser_month'))
                <a href="{{ route('sales.sponser', []) }}" class="nav-link {{ Request::routeIs('sales.sponser') ? 'active' : '' }}">月別売り上げ</a>
              @elseif(Request::routeIs('sales.addition') || Request::routeIs('sales.addition_month'))
                <a href="{{ route('sales.addition', []) }}" class="nav-link {{ Request::routeIs('sales.addition') ? 'active' : '' }}">月別売り上げ</a>
              @endif
            </li>
            <li class="nav-item">
              @if(Request::routeIs('sales.index') || Request::routeIs('sales.month'))
                <a href="{{ route('sales.year', []) }}" class="nav-link {{ Request::routeIs('sales.year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.production') || Request::routeIs('sales.production_month'))
                <a href="{{ route('sales.production_year', []) }}" class="nav-link {{ Request::routeIs('sales.production_year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.operating') || Request::routeIs('sales.operating_month'))
                <a href="{{ route('sales.operating_year', []) }}" class="nav-link {{ Request::routeIs('sales.operating_year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.sponser') || Request::routeIs('sales.sponser_month'))
                <a href="{{ route('sales.sponser_year', []) }}" class="nav-link {{ Request::routeIs('sales.sponser_year') ? 'active' : '' }}">年別売り上げ</a>
              @elseif(Request::routeIs('sales.addition') || Request::routeIs('sales.addition_month'))
                <a href="{{ route('sales.addition_year', []) }}" class="nav-link {{ Request::routeIs('sales.addition_year') ? 'active' : '' }}">年別売り上げ</a>
              @endif
            </li>
        </ul>
    </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-12">
            @if(Request::routeIs('sales.index') || Request::routeIs('sales.month'))
              {!! Form::open(['route' => ['sales.month']]) !!}
            @elseif(Request::routeIs('sales.production') || Request::routeIs('sales.production_month'))
              {!! Form::open(['route' => ['sales.production_month']]) !!}
            @elseif(Request::routeIs('sales.operating') || Request::routeIs('sales.operating_month'))
              {!! Form::open(['route' => ['sales.operating_month']]) !!}
            @elseif(Request::routeIs('sales.sponser') || Request::routeIs('sales.sponser_month'))
              {!! Form::open(['route' => ['sales.sponser_month']]) !!}
            @elseif(Request::routeIs('sales.addition') || Request::routeIs('sales.addition_month'))
              {!! Form::open(['route' => ['sales.addition_month']]) !!}
            @endif

              <select class="form-control" name="year" style="width: 100px; margin: 0 0 0 auto;" onchange="submit(this.form)">
                <option selected>{{$this_year}}</option>
                @foreach ($years as $year)
                <option value="{{$year}}">{{$year}}</option>
                @endforeach
              </select>
            
            @if(Request::routeIs('sales.sponser') || Request::routeIs('sales.sponser_month'))
              <select class="form-control" name="costomer" style="width: 120px; margin: 0 0 0 auto;" onchange="submit(this.form)">
                <option value="0" {{ $cos == 0 ? 'selected' : '' }}>全て</option>
                @foreach ($costomers as $costomer)
                <option value="{{$costomer->id}}" {{ $costomer->id == $cos ? 'selected' : '' }}>{{$costomer->name}}</option>
                @endforeach
              </select>
            @else
              <select class="form-control" name="site" style="width: 120px; margin: 0 0 0 auto;" onchange="submit(this.form)">
                <option value="0" {{ $cos == 0 ? 'selected' : '' }}>全て</option>
                @foreach ($sites as $site)
                <option value="{{$site->id}}" {{ $site->id == $cos ? 'selected' : '' }}>{{$site->name}}</option>
                @endforeach
              </select>
            @endif

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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>
  
  @if(Request::routeIs('sales.index') || Request::routeIs('sales.month'))
  <?php
    $salesgraph = new \App\salesgraph;

    list($varJsSales, $varJsMonth, $max1, $i) = $salesgraph->create($sales);
    list($varJsProductions, $varJsProductionsMonth, $max2, $i) = $salesgraph->create($productions);
    list($varJsOperatings, $varJsOperatingsMonth, $max3, $i) = $salesgraph->create($operatings);
    list($varJsSponsers, $varJsSponsersMonth, $max4, $i) = $salesgraph->create($sponsers);
    list($varJsAdditions, $varJsAdditionsMonth, $max5, $i) = $salesgraph->create($additions);
    //dd($sales);
    $max = $max1;

  ?>
  @else
  <?php
    $salesgraph = new \App\salesgraph;

    list($varJsSales, $varJsMonth, $max, $i) = $salesgraph->create($sales);
  ?>
  @endif

  @if($sales != null && $i > 1 || count($sales) == 1)
    <script type="text/javascript">
        var sales = JSON.parse('<?php echo $varJsSales; ?>');
        var months = JSON.parse('<?php echo $varJsMonth; ?>');
        var additions = JSON.parse('<?php echo $varJsAdditions; ?>');
        var additions_months = JSON.parse('<?php echo $varJsAdditionsMonth; ?>');
        var max = JSON.parse('<?php echo $max; ?>');
    </script>
  @endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/chart-bar-demo.js') }}"></script>

  @endsection