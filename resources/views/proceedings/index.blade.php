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
            {!! link_to_route('costomers.meeting', 'ミーティングスケジュール', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('proceedings.index', 'ミーティング議事録', ['id' => $costomer->id], ['class' => 'nav-link active']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('costomers.sponser', 'スポンサー管理', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
          </li>
        </ul>
      </div><br>
      <div class="col-3">
        {!! link_to_route('proceedings.create', '作成', ['id' => $costomer->id], ['class' => 'btn btn-info btn-lg']) !!}
      </div><br>
      <div class="col-10 offset-1">
        <table class="table table-bordered table-hover" id="schedules">
          <thead>
            <tr>
              <th>日時</th>
              <th>詳細</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach($proceedings as $proceeding)
            <tr>
              <td>{{ $proceeding->day }}</td>
              <td>{!! link_to_route('proceedings.show', '詳細', ['id' => $proceeding->id], ['class' => 'btn btn-primary']) !!}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div><br>
  </div>
</div>

@endsection