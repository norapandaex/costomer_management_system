@extends('layouts.app')

@section('content')
  <h1 class="mt-4">スポンサー登録</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Costomer</li>
  </ol>
  <div class="row align-items-center">
    <div class="col-8 offset-2">
      {!! Form::model($sponser, ['route' => ['costomers.sponser_update', $sponser->id], 'method' => 'put']) !!}

        <div class="form-group">
          {!! Form::label('name', 'スポンサー名') !!}
          {!! Form::text('name', $sponser->name, ['class' => 'form-control', 'reqired']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('cost', 'スポンサー費') !!}
          {!! Form::text('cost', $sponser->cost, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('rate', '利率(%)') !!}
          {!! Form::number('rate', $sponser->rate, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('start', '契約開始日') !!}
          <input type="date" name="start" class="form-control" value="{{$sponser->start}}">
        </div>

        <div class="form-group">
          {!! Form::label('stop', '契約終了日') !!}
          <input type="date" name="stop" class="form-control" value="{{$sponser->stop}}">
        </div>

        <div class="col-12">&nbsp;</div>
        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
      {!! Form::close() !!}
    </div><br><br>
  </div>
@endsection
