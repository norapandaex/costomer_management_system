@extends('layouts.app')

@section('content')
  <h1 class="mt-4">スポンサー登録</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Costomer</li>
  </ol>
  <div class="row align-items-center">
    <div class="col-8 offset-2">
      {!! Form::open(['route' => ['costomers.sponser_store', 'id' => $costomer->id]]) !!}

        <div class="form-group">
          {!! Form::label('name', 'スポンサー名') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'reqired']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('cost', 'スポンサー費') !!}
          {!! Form::text('cost', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('rate', '利率(%)') !!}
          {!! Form::number('rate', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('start', '開始日') !!}
          <input type="date" name="start" class="form-control">
        </div>

        <div class="form-group">
          {!! Form::label('stop', '終了日') !!}
          <input type="date" name="stop" class="form-control">
        </div>

        <div class="col-12">&nbsp;</div>
        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
      {!! Form::close() !!}
    </div><br><br>
  </div>
@endsection
