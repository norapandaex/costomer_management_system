@extends('layouts.app')

@section('content')
    <h1 class="mt-4">ユーザ登録</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">register</li>
    </ol>
    
    @include('commons.error_messages')
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('division', '所属') !!}
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" name="division">
                          <option value="0">選択</option>
                          <option value="1">HP制作事業部</option>
                          <option value="2">P管理事業部1</option>
                          <option value="3">P管理事業部2</option>
                          <option value="4">メディア事業部</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection