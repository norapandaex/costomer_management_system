@extends('layouts.app')

@section('content')
    <h1 class="mt-4">スケジュール編集</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    @include('commons.error_messages')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model($schedule, ['route' => ['schedules.update', $schedule->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('day', '予定日時') !!}
                    <input type="datetime-local" name="day" class="form-control" value="{{$day}}">
                </div>
                
                <div class="form-group">
                    {!! Form::label('title', 'タトル') !!}
                    {!! Form::text('title', $schedule->title, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', '内容') !!}
                    {!! Form::textarea('content', $schedule->content, ['class' => 'form-control','rows' => '4', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('reminder', 'リマインダー設定') !!}<br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="reminder" id="reminder1" value="1" @if($schedule->reminder == 1) checked @endif>
                      <label class="form-check-label" for="reminder1">あり</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="reminder" id="reminder2" value="0" @if($schedule->reminder == 0) checked @endif>
                      <label class="form-check-label" for="reminder2">なし</label>
                    </div>
                </div>
                
                <div align="center">
                    {!! link_to_route('schedules.show', '戻る', ['id' => $schedule->id], ['class' => 'btn btn-primary']) !!}
                    {!! Form::submit('保存', ['class' => 'btn btn-info']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection