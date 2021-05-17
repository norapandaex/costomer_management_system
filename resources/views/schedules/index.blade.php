@extends('layouts.app')

@section('content')
    <h1 class="mt-4">スケジュール管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    
    <div id="mini-calendar"></div>
    
    {!! link_to_route('schedules.create', '作成', [], ['class' => 'btn btn-info btn-lg']) !!}
    
    <div class="col-12">&nbsp;</div>
    
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
                <?php
                    if(count($schedules) > 0){
                        $title[] = $schedule->title;
                        $daydata[] = $schedule->day;
                        $varJsTitle = json_encode($title);
                        $varJsDay = json_encode($daydata);
                    }
                ?>
                @endforeach
            </tbody>
        </table>
    @if(count($schedules) > 0)
    <script type="text/javascript">
    var titles=JSON.parse('<?php echo $varJsTitle; ?>');
    var days=JSON.parse('<?php echo $varJsDay; ?>');
    </script>
    @endif
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.minicalendar.js') }}"></script>
    <script>
        (function($) {
    $(function() {
        $('#mini-calendar').miniCalendar();
    });
})(jQuery);
    </script>
@endsection