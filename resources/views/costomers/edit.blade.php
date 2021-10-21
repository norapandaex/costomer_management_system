@extends('layouts.app')

@section('content')
    <h1 class="mt-4">顧客編集</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    @include('commons.error_messages')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model($costomer, ['route' => ['costomers.update', $costomer->id], 'method' => 'put']) !!}
                
                <div class="form-group">
                    {!! Form::label('team_name', 'チーム名') !!}
                    {!! Form::text('team_name', $costomer->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('relation', '関係') !!}
                    <div class="input-group mb-3">
                      <select class="custom-select" id="relation" name="relation">
                        <option value="0" @if($costomer->relation == 0) selected @endif>選択</option>
                        <option value="1" @if($costomer->relation == 1) selected @endif>チーム</option>
                        <option value="2" @if($costomer->relation == 2) selected @endif>大会</option>
                        <option value="3" @if($costomer->relation == 3) selected @endif>協会</option>
                        <option value="4" @if($costomer->relation == 4) selected @endif>その他</option>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('category', 'カテゴリー') !!}
                    <div class="input-group mb-3">
                      <select class="custom-select" id="category" name="category">
                        <option value="0" @if($costomer->relation == 0) selected @endif>選択</option>
                        <option value="1" @if($costomer->relation == 1) selected @endif>小学</option>
                        <option value="2" @if($costomer->relation == 2) selected @endif>中学</option>
                        <option value="3" @if($costomer->relation == 3) selected @endif>高校</option>
                        <option value="4" @if($costomer->relation == 4) selected @endif>大学</option>
                        <option value="5" @if($costomer->relation == 5) selected @endif>社会人</option>
                        <option value="6" @if($costomer->relation == 6) selected @endif>小・中</option>
                        <option value="7" @if($costomer->relation == 7) selected @endif>小・中・高</option>
                        <option value="8" @if($costomer->relation == 8) selected @endif>小・中・高・大</option>
                        <option value="9" @if($costomer->relation == 9) selected @endif>小・中・高・大・社会人</option>
                        <option value="10" @if($costomer->relation == 10) selected @endif>中・高</option>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('staff', '顧客担当者名') !!}
                    {!! Form::text('staff', $costomer->staff, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('mystaff', '弊社担当者名') !!}
                    {!! Form::text('mystaff', $costomer->mystaff, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-row align-items-center">
                    <div class="col-md-6 mb-4">
                        <label for="address">郵便番号</label>
                        <input class="form-control" id="postcode" name="address" type="text" size="12" maxlength="8" placeholder="000-0000" value="{{ $costomer->address }}">
                    </div>
                    <div class="col-auto my-1">
                        <a href="#" class="btn btn-secondary" id="pos">検索</a>
                    </div>
                </div>
                
                <div id="result">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>都道府県</label>
                            <input class="form-control" id="pref" name="prefecture" type="text" size="6" value="{{ $costomer->prefecture }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>市区町村</label>
                            <input class="form-control" id="city" name="city" type="text" size="6" value="{{ $costomer->city }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>住所</label>
                            <input class="form-control" id="address" name="other" type="text" value="{{ $costomer->other }}">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="email">メールアドレス(ID)</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $costomer->email }}">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="tel">電話番号</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="{{ $costomer->tel }}">
                    </div>
                </div>

                <div align="center">
                    {!! link_to_route('costomers.show', '戻る', ['costomer' => $costomer->id], ['class' => 'btn btn-primary']) !!}
                    {!! Form::submit('保存', ['class' => 'btn btn-info']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
    <script src="{{ asset('/js/address.js') }}"></script>
    
@endsection