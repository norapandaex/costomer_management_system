@extends('layouts.app')

@section('content')
    <h1 class="mt-4">ホーム</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Home</li>
    </ol>
    <div class="row">
        <div class="col-12">
            <!-- xxxx年xx月を表示 -->
            <h1 id="header"></h1>
        
            <!-- ボタンクリックで月移動 -->
            <div id="next-prev-button">
                <button id="prev" onclick="prev()">‹</button>
                <button id="next" onclick="next()">›</button>
            </div>
        
            <!-- カレンダー -->
            <div id="calendar"></div>
        </div>
    </div><br><br>
    <h3>本日の予定</h3><br>
        <table class="table table-bordered table-hover" id="schedules">
            <thead>
                <tr>
                    <th>id</th>
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
        </table><br>
    
@endsection
