@extends('layouts.app')

@section('content')
<h1 class="mt-4">議事録作成</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Costomer</li>
</ol>
@include('commons.error_messages')
<div class="row">
  <div class="col-sm-6 offset-sm-3">

    {!! Form::open(['route' => 'proceedings.store']) !!}

    <div class="form-group">
      {!! Form::label('day', '予定日時') !!}
      <input type="datetime-local" name="day" class="form-control">
    </div>

    <div class="form-group">
      {!! Form::label('content', '内容') !!}
      {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '10', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
    </div>

    <input type="hidden" name="costomer" value="{{$costomer->id}}">

    {!! Form::submit('作成', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection