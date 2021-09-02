@extends('layouts.app')

@section('content')
<h1 class="mt-4">サイト情報登録</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Site</li>
</ol>
@include('commons.error_messages')
<div class="row">
    <div class="col-sm-12">

        {!! Form::open(['route' => 'sites.store']) !!}

        <div class="form-group col-10">
            {!! Form::label('name', 'サイト名') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-10">
            {!! Form::label('url', 'サイトURL') !!}
            {!! Form::text('url', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-10">
            {!! Form::label('analytics', 'アクセス解析URL') !!}
            {!! Form::text('analytics', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-10">
            {!! Form::label('open', '公開日') !!}
            <input type="date" name="open" class="form-control">
        </div>

        <div class="form-group col-10">
            {!! Form::label('contract_day', '契約日') !!}
            <input type="date" name="contract_day" class="form-control">
        </div>

        <div class="form-group col-10">
            {!! Form::label('inside_staff', '内部制作担当') !!}
            {!! Form::text('inside_staff', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-10">
            {!! Form::label('outside_staff', '内部運営担当') !!}
            {!! Form::text('outside_staff', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-10">
            {!! Form::label('start', '制作開始日') !!}
            <input type="date" name="start" class="form-control">
        </div>

        <div class="form-group col-10">
            {!! Form::label('production_cost', '製作費') !!}
            {!! Form::text('production_cost', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-10">
            {!! Form::label('operating_cost', '運営費') !!}
            {!! Form::text('operating_cost', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('contract', '契約内容') !!}
            {!! Form::textarea('contract', null, ['class' => 'form-control','rows' => '10', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('relation', '顧客選択') !!}
            <table class="table table-bordered table-hover" id="sites">
                <thead>
                    <tr>
                        <th>顧客名</th>
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
                        <th  style="max-width: 80px;">{{ $costomer->tel }}</th>
                        <td><input type="radio" id="costomer{{ $costomer->id }}" name="costomer_id" value="{{ $costomer->id }}"><label for="costomer{{ $costomer->id }}">選択</label></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection