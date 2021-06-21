@extends('layouts.app')

@section('content')
<h1 class="mt-4">スケジュール詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Schedule</li>
</ol>
<div class="row align-items-center">
    <div class="col-8 offset-2">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>予定日時</th>
                    <td>{{ $schedule->day }}</td>
                </tr>
                <tr>
                    <th>タイトル</th>
                    <td>{{ $schedule->title }}</td>
                </tr>
                @if($schedule->costomer_id != null)
                <tr>
                    <th>チーム名</th>
                    <td>{{ $schedule->costomer->name }}</td>
                </tr>
                @endif
                <tr>
                    <th>内容</th>
                    <td>
                        <p class="mb-0" style="text-align: left;">{!! nl2br(e($schedule->content)) !!}</p>
                    </td>
                </tr>
                <tr>
                    <th>状態</th>
                    <td>
                        @if($schedule->status == 0)
                        {!! Form::open(['route' => ['schedules.status', $schedule->id, $schedule->status], 'method' => 'put']) !!}
                        未完了&nbsp;&nbsp;{!! Form::submit('切替', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        @else
                        {!! Form::open(['route' => ['schedules.status', $schedule->id, $schedule->status], 'method' => 'put']) !!}
                        完了&nbsp;&nbsp;{!! Form::submit('切替', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>リマインダー</th>
                    <td>
                        @if($schedule->reminder == 1)
                        {!! Form::open(['route' => ['schedules.reminder', $schedule->id, $schedule->reminder], 'method' => 'put']) !!}
                        あり&nbsp;&nbsp;{!! Form::submit('切替', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        @else
                        {!! Form::open(['route' => ['schedules.reminder', $schedule->id, $schedule->reminder], 'method' => 'put']) !!}
                        なし&nbsp;&nbsp;{!! Form::submit('切替', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table><br>
        <div align="center">
            @if (Auth::id() == $schedule->user_id || $schedule->user_id == null)
            {!! Form::open(['route' => ['schedules.destroy', $schedule->id], 'method' => 'delete']) !!}
            {!! link_to_route('schedules.edit', '編集', ['id' => $schedule->id], ['class' => 'btn btn-info btn-lg']) !!}&nbsp;&nbsp;
            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-lg']) !!}&nbsp;&nbsp;
            <input type="button" class="btn btn-primary btn-lg" onclick="window.history.back();" value="戻る">
            {!! Form::close() !!}
            @endif
        </div>
    </div>
</div>
@endsection