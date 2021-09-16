@extends('layouts.app')

@section('content')
    <h1 class="mt-4">顧客登録</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    @include('commons.error_messages')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'costomers.store']) !!}
                
                <div class="form-group">
                    {!! Form::label('team_name', 'チーム名') !!}
                    {!! Form::text('team_name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('relation', '関係') !!}
                    <div class="input-group mb-3">
                      <select class="custom-select" id="inputGroupSelect01" name="relation">
                        <option value="0">選択</option>
                        <option value="1">チーム</option>
                        <option value="2">大会</option>
                        <option value="3">協会</option>
                        <option value="4">その他</option>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('category', 'カテゴリー') !!}
                    <div class="input-group mb-3">
                      <select class="custom-select" id="inputGroupSelect01" name="category">
                        <option value="0">選択</option>
                        <option value="1">小学</option>
                        <option value="2">中学</option>
                        <option value="3">高校</option>
                        <option value="4">大学</option>
                        <option value="5">社会人</option>
                        <option value="6">小・中</option>
                        <option value="7">小・中・高</option>
                        <option value="8">小・中・高・大</option>
                        <option value="9">小・中・高・大・社会人</option>
                        <option value="10">中・高</option>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('staff', '顧客担当者名') !!}
                    {!! Form::text('staff', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mystaff', '弊社担当者名') !!}
                    {!! Form::text('mystaff', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-4">
                        <label for="postcode">郵便番号</label>
                        <input class="form-control" id="postcode" name="address" type="text" size="12" maxlength="8" placeholder="000-0000">
                    </div>
                    <div class="col-auto my-1">
                        <a href="#" class="btn btn-secondary" id="pos">検索</a>
                    </div>
                </div>
                
                <div id="result">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>都道府県</label>
                            <input class="form-control" id="pref" name="prefecture" type="text" size="6">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>市区町村</label>
                            <input class="form-control" id="city" name="city" type="text" size="6">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>住所</label>
                            <input class="form-control" id="address" name="other" type="text">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="email">メールアドレス(ID)</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="tel">電話番号</label>
                        <input type="text" class="form-control" id="tel" name="tel">
                    </div>
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
    <script src="{{ asset('/js/address.js') }}"></script>
    
@endsection