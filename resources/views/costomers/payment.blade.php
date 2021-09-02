@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{$sponser->costomer->name}}のスポンサー詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Costomer</li>
</ol>
<div class="row align-items-center">
  <div class="col-10 offset-1">
    <div class="card text-center">
      <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                  {!! link_to_route('costomers.sponser_show', 'スポンサー詳細', ['id' => $sponser->id], ['class' => 'nav-link']) !!}
              </li>
              <li class="nav-item">
                  {!! link_to_route('costomers.payment', '入金管理', ['id' => $sponser->id], ['class' => 'nav-link active']) !!}
              </li>
          </ul>
      </div><br>
      <h3>{{$sponser->name}}の入金管理</h3>
      <div align="center">
        <div class="col-8">
          {!! Form::open(['route' => ['costomers.payment_store', 'id' => $sponser->id]]) !!}

            <div class="form-group">
              {!! Form::label('day', '入金日') !!}
              <input type="date" name="day" class="form-control">
            </div>

            <div class="form-group">
              {!! Form::label('amount', '金額') !!}
              {!! Form::text('amount', null, ['class' => 'form-control', 'reqired']) !!}
            </div>

            <div class="col-12">&nbsp;</div>
            {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}&nbsp;&nbsp;
          {!! Form::close() !!}
        </div>
        <div class="col-8">
          <table class="table table-bordered table-hover" id="sales">
            <thead>
                <tr>
                    <th>入金日</th>
                    <th>金額</th>
                    <th>詳細</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($payments as $payment)
                  <tr>
                    <td>{{$payment->day}}</td>
                    <td>{{$payment->amount}}</td>
                    <td>
                      {!! Form::open(['route' => ['costomers.payment_destroy', ['id' => $payment->id, 'sponser' => $sponser->id]], 'method' => 'delete']) !!}
                      {{--{!! link_to_route('sites.pv_edit', '編集', ['id' => $pv->id, 'site' => $site->id], ['class' => 'btn btn-primary']) !!}--}}&nbsp;&nbsp;
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div><br>
    </div><br>
  </div>
</div>
@endsection