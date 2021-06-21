@extends('layouts.app')

@section('content')
<h1 class="mt-4">議事録編集</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Costomer</li>
</ol>
@include('commons.error_messages')
<div class="row">
  <div class="col-sm-6 offset-sm-3">

    {!! Form::model($proceeding, ['route' => ['proceedings.update', $proceeding->id], 'method' => 'put']) !!}

    <div class="form-group">
      {!! Form::label('day', '予定日時') !!}
      <input type="datetime-local" name="day" class="form-control" value="{{$day}}">
    </div>

    <div class="form-group">
      {!! Form::label('content', '内容') !!}
      {!! Form::textarea('content', $proceeding->content, ['class' => 'form-control','rows' => '10', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
    </div>


    <div align="center">
      {!! link_to_route('proceedings.show', '戻る', ['id' => $proceeding->id], ['class' => 'btn btn-primary']) !!}
      {!! Form::submit('保存', ['class' => 'btn btn-info']) !!}
    </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection