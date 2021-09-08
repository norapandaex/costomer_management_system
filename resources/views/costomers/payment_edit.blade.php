@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{$payment->sponser->costomer->name}}のスポンサー詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Costomer</li>
</ol>
<div class="row align-items-center">
  <div class="col-10 offset-1">
    <div align="center">
      <div class="col-8">
        {!! Form::model($payment, ['route' => ['costomers.payment_update', $payment->id], 'method' => 'put']) !!}

          <div class="form-group">
            {!! Form::label('day', '入金日') !!}
            <input type="date" name="day" class="form-control" value="{{$payment->day}}">
          </div>

          <div class="form-group">
            {!! Form::label('amount', '金額') !!}
            {!! Form::text('amount', $payment->amount, ['class' => 'form-control', 'reqired']) !!}
          </div>

          <div class="col-12">&nbsp;</div>
          {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}&nbsp;&nbsp;
        {!! Form::close() !!}
      </div>
    </div><br>
  </div>
</div>
@endsection