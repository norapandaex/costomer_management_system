@extends('layouts.app')

@section('content')
<h1 class="mt-4">スケジュール作成</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Schedule</li>
</ol>
@include('commons.error_messages')
<div class="row">
    <div class="col-sm-10 offset-sm-1">

        {!! Form::open(['route' => 'schedules.store']) !!}

        <div class="col-sm-8 offset-sm-2">
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

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" onclick="checkdiv(this,'checkBox')">
                    <label class="form-check-label" for="gridCheck">
                        定期ミーティング
                    </label>
                </div>
            </div>
        </div>

        <div class="col-12" id="checkBox" style="display:none;">

            <div class="form-group">
                {!! Form::label('term', '資料期限') !!}
                <input type="datetime-local" name="term" class="form-control">
            </div>

            <div class="form-group">
                {!! Form::label('relation', 'チーム選択') !!}
                <table class="table table-bordered table-hover" id="sites">
                    <thead>
                        <tr>
                            <th>チーム名</th>
                            <th>カテゴリー</th>
                            <th>都道府県</th>
                            <th>担当者</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>詳細</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($costomers as $costomer)
                        <tr>
                            <td>{{ $costomer->name }}</td>
                            <td>
                                @if($costomer->category == 1)
                                小学
                                @elseif($costomer->category == 2)
                                中学
                                @elseif($costomer->category == 3)
                                高校
                                @elseif($costomer->category == 4)
                                大学
                                @elseif($costomer->category == 5)
                                社会人
                                @elseif($costomer->category == 6)
                                小・中
                                @elseif($costomer->category == 7)
                                小・中・高
                                @elseif($costomer->category == 8)
                                小・中・高・大
                                @elseif($costomer->category == 9)
                                小・中・高・大・社会人
                                @elseif($costomer->category == 10)
                                中・高
                                @endif
                            </td>
                            <td>{{ $costomer->prefecture }}</td>
                            <td>{{ $costomer->staff }}</td>
                            <th>{{ $costomer->email }}</th>
                            <th>{{ $costomer->tel }}</th>
                            <td><input type="radio" id="costomer{{ $costomer->id }}" name="costomer_id" value="{{ $costomer->id }}"><label for="costomer{{ $costomer->id }}">選択</label></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-8 offset-sm-2">
            {!! Form::submit('作成', ['class' => 'btn btn-primary btn-block']) !!}
        </div><br>
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript">
    function checkdiv(obj, id) {
        if (obj.checked) {
            document.getElementById(id).style.display = "block";
        } else {
            document.getElementById(id).style.display = "none";
        }
    }
</script>
@endsection