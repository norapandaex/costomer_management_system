@extends('layouts.app')

@section('content')
    <h1 class="mt-4">スケジュール作成</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'schedules.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('day', '予定日時') !!}
                    <input type="datetime-local" name="day" class="form-control">
                </div>
                
                <div class="form-group">
                    {!! Form::label('title', 'タトル') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', '内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '4', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('reminder', 'リマインダー設定') !!}<br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="reminder" id="reminder1" value="1" checked>
                      <label class="form-check-label" for="reminder1">あり</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="reminder" id="reminder2" value="0">
                      <label class="form-check-label" for="reminder2">なし</label>
                    </div>
                </div>

                {!! Form::submit('作成', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection