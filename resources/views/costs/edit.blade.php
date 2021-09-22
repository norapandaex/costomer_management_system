@extends('layouts.app')

@section('content')
<h1 class="mt-4">コスト管理</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Costs</li>
</ol>
<div class="row align-items-center">
  <div class="col-10 offset-1">
    <div class="card">
      <div class="card-header">
        <h3>編集</h3>
      </div><br>
      <div align="center">
        <div class="col-8">
          {!! Form::model($cost, ['route' => ['costs.update', $cost->id], 'method' => 'put']) !!}

            <div class="form-group">
              {!! Form::label('day', '日付') !!}
              <input type="date" name="day" class="form-control" value="{{$cost->day}}">
            </div>

            <div class="form-group">
              {!! Form::label('cost', '金額') !!}
              {!! Form::text('cost', $cost->cost, ['class' => 'form-control', 'reqired']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('content', '内容') !!}
              {!! Form::textarea('content', $cost->content, ['class' => 'form-control','rows' => '4', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
            </div>

            <div class="col-12">&nbsp;</div>
            {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}&nbsp;&nbsp;
          {!! Form::close() !!}
        </div>
      </div><br>
    </div><br>
  </div>
</div>
@endsection