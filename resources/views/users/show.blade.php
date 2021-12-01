@extends('layouts.app')

@section('content')
<h1 class="mt-4">マイページ</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">MyPage</li>
</ol>
<div class="row align-items-center">
    <div class="col-10 offset-1">

      @if (session('warning'))
          <div class="alert alert-warning">
              {{ session('warning') }}
          </div>
      @endif
      @if (session('status'))
          <div class="alert alert-info">
              {{ session('status') }}
          </div>
      @endif

      @include('commons.error_messages')

      @if(Auth::user()->division == 0)
        {!! link_to_route('users.index', '社員一覧', [], ['class' => 'btn btn-info']) !!}
    　@endif
      
    <div class="col-10 offset-1">&nbsp;</div>

        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>所属</th>
                    <td>
                      @if(Auth::user()->division == 0)
                          管理者
                      @elseif(Auth::user()->division == 1)
                          WEB事業部/HP制作事業部
                      @elseif(Auth::user()->division == 2)
                          P管理事業部/マーケティング事業部
                      @elseif(Auth::user()->division == 3)
                          P管理事業部/動画事業部
                      @elseif(Auth::user()->division == 4)
                          WEB事業部/メディア事業部
                      @endif
                    </td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>{{$user->name}}</td>
                </tr>
            </tbody>
        </table><br>

        <div class="card">
          <div class="card-header">
            情報編集
          </div>
          <div class="card-body">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
          </div>
        </div>

        <br>

        <div class="card">
          <div class="card-header">
            パスワード変更
          </div>
          <div class="card-body">

            {!! Form::model($user, ['route' => ['users.password_update', $user->id], 'method' => 'post']) !!}
                {{ csrf_field() }}
                {{ method_field('patch') }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="form-group">
                    {!! Form::label('password', 'パスワード(8文字以上)') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
          </div>
        </div>
    </div>
</div>
@endsection