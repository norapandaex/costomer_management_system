@extends('layouts.app')

@section('content')
<h1 class="mt-4">顧客詳細</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Schedule</li>
</ol>
<div class="row align-items-center">
  <div class="col-10 offset-1">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            {!! link_to_route('costomers.show', '顧客詳細', ['costomer' => $costomer->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('costomers.meeting', 'ミーティングスケジュール', ['id' => $costomer->id], ['class' => 'nav-link active']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('proceedings.index', 'ミーティング議事録', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('costomers.sponser', 'スポンサー管理', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
        </li>
        </ul>
      </div><br>

      <div class="col-10 offset-1">
        <table class="table table-bordered table-hover" id="schedules">
          <thead>
            <tr>
              <th>タイトル</th>
              <th>予定日時</th>
              <th>状態</th>
              <th>リマインダー</th>
              <th>詳細</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach($schedules as $schedule)
            <tr>
              <td>{{ $schedule->title }}</td>
              <td>{{ $schedule->day }}</td>
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
              <td>{!! link_to_route('schedules.show', '詳細', ['id' => $schedule->id], ['class' => 'btn btn-primary']) !!}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
    @endsection