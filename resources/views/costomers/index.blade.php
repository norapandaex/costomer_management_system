@extends('layouts.app')

@section('content')
    <h1 class="mt-4">顧客管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Costomer</li>
    </ol>
    
    {!! link_to_route('costomers.create', '登録', [], ['class' => 'btn btn-info btn-lg']) !!}
    
    <div class="col-12">&nbsp;</div>
    
    <table class="table table-bordered table-hover" id="schedules">
        <thead>
            <tr>
                <th>チーム名</th>
                <th>カテゴリー</th>
                <th>都道府県</th>
                <th>顧客担当者</th>
                <th>弊社担当者</th>
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
                <td>{{ $costomer->mystaff }}</td>
                <th>{{ $costomer->email }}</th>
                <th style="max-width: 80px;">{{ $costomer->tel }}</th>
                <td>{!! link_to_route('costomers.show', '詳細', ['costomer' => $costomer->id], ['class' => 'btn btn-primary']) !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection