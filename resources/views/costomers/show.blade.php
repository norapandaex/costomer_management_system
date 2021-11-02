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
                        {!! link_to_route('costomers.show', '顧客詳細', ['costomer' => $costomer->id], ['class' => 'nav-link active']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.meeting', 'ミーティングスケジュール', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('proceedings.index', 'ミーティング議事録', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.operate', '入金済み運営費', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.sponser', 'スポンサー管理', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                </ul>
            </div><br>

            <div class="col-10 offset-1">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>チーム名</th>
                            <td>{{ $costomer->name }}</td>
                        </tr>
                        <tr>
                            <th>顧客ランク</th>
                            <td>
                                @if($costomer->rank == 1)
                                    A
                                @endif
                                @if($costomer->rank == 2)
                                    B
                                @endif
                                @if($costomer->rank == 3)
                                    C
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>関係</th>
                            <td>
                                @if($costomer->category == 1)
                                チーム
                                @elseif($costomer->category == 2)
                                大会
                                @elseif($costomer->category == 3)
                                協会
                                @elseif($costomer->category == 4)
                                その他
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>カテゴリ</th>
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
                        </tr>
                        <tr>
                            <th>顧客担当者</th>
                            <td>{{ $costomer->staff }}</td>
                        </tr>
                        <tr>
                            <th>弊社担当者</th>
                            <td>{{ $costomer->mystaff }}</td>
                        </tr>
                        <tr>
                            <th>運用サイト</th>
                            <td>
                                @foreach($sites as $site)
                                <a href="{{ $site->url }}">{{ $site->url }}</a>&nbsp;&nbsp;{!! link_to_route('sites.show', '詳細', ['site' => $site->id], ['class' => 'btn btn-primary btn-sm']) !!}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>〒{{ $costomer->address }}&nbsp;&nbsp;{{ $costomer->prefecture }}{{ $costomer->city }}{{ $costomer->other }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $costomer->email }}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{ $costomer->tel }}</td>
                        </tr>
                        <tr>
                            <th>スポンサー数</th>
                            <td>{{$count}}</td>
                        </tr>
                        <tr>
                            <th>累計売り上げ</th>
                            <td>{{$operate}}</td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div align="center">
                {!! Form::open(['route' => ['costomers.destroy', $costomer->id], 'method' => 'delete']) !!}
                {!! link_to_route('costomers.edit', '編集', ['costomer' => $costomer->id], ['class' => 'btn btn-info btn-lg']) !!}&nbsp;&nbsp;
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-lg']) !!}&nbsp;&nbsp;
                {!! link_to_route('costomers.index', '戻る', [], ['class' => 'btn btn-primary btn-lg']) !!}
                {!! Form::close() !!}
            </div><br>

        </div><br>

    </div>
</div>
@endsection