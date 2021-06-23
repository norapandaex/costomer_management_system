@extends('layouts.app')

@section('content')
<h1 class="mt-4">サイト詳細</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Schedule</li>
</ol>
<div class="row align-items-center">
  <div class="col-8 offset-2">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            {!! link_to_route('sites.show', 'サイト詳細', ['site' => $site->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('sites.pv', 'pv数', ['id' => $site->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('sales.edit', '売り上げ設定', ['id' => $site->id], ['class' => 'nav-link active']) !!}
          </li>
        </ul>
      </div>
      <div class="card-body">

        @include('commons.error_messages')

        @if($flag == 0)
        {!! Form::model($sale, ['route' => ['sales.update', $sale->id], 'method' => 'put']) !!}
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <th>製作費売り上げ月</th>
              <td><input type="month" name="production_month" class="form-control" value="{{ $sale->production_month }}"></td>
            </tr>
            <tr>
              <th>製作費</th>
              <td>{!! Form::text('production_cost', $sale->production_cost, ['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
              <th>運営費開始月</th>
              <td><input type="month" name="operating_month" class="form-control" value="{{ $sale->operating_month }}"></td>
            </tr>
            <tr>
              <th>運営費</th>
              <td>{!! Form::text('operating_cost', $sale->operating_cost, ['class' => 'form-control']) !!}</td>
            </tr>
          </tbody>
        </table><br>
        <div align="center">
          {!! Form::submit('登録', ['class' => 'btn btn-info btn-lg']) !!}
        </div>
        {!! Form::close() !!}
        @else
        {!! Form::open(['route' => ['sales.store', $site->id]]) !!}
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <th>製作費</th>
              <td>{!! Form::text('production_cost', $site->production_cost, ['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
              <th>運営費開始月</th>
              <td><input type="month" name="month" class="form-control" value="{{ $site->month }}"></td>
            </tr>
            <tr>
              <th>運営費</th>
              <td>{!! Form::text('operating_cost', $site->operating_cost, ['class' => 'form-control']) !!}</td>
            </tr>
          </tbody>
        </table><br>
        <div align="center">
          {!! Form::submit('登録', ['class' => 'btn btn-info btn-lg']) !!}
        </div>
        {!! Form::close() !!}
        @endif
      </div>
    </div>
  </div>
</div>
@endsection