@extends('layouts.app')

@section('content')
<h1 class="mt-4">社員一覧</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">employee</li>
</ol>

<div class="col-10 offset-1">&nbsp;</div>

<div class="col-10 offset-1">
  <table class="table table-bordered table-hover" id="sites">
      <thead>
          <tr>
              <th>社員名</th>
              <th>所属</th>
              <th style="width: 30px;">操作</th>
          </tr>
      </thead>
      <tbody class="text-center">
          @foreach($users as $user)
          <tr>
              <td style="font-size: 20px;">{{ $user->name }}</td>
              <td>
                {!! Form::model($user, ['route' => ['users.division', $user->id], 'method' => 'put']) !!}
                    <select class="custom-select" id="inputGroupSelect01" name="division">
                      <option value="0" {{ $user->division == 0 ? 'selected' : '' }}>管理者</option>
                      <option value="1" {{ $user->division == 1 ? 'selected' : '' }}>WEB事業部/HP制作事業部</option>
                      <option value="4" {{ $user->division == 4 ? 'selected' : '' }}>WEB事業部/メディア事業部</option>
                      <option value="2" {{ $user->division == 2 ? 'selected' : '' }}>P管理事業部/マーケティング事業部</option>
                      <option value="3" {{ $user->division == 3 ? 'selected' : '' }}>P管理事業部/動画事業部</option>
                    </select>
                    <a hidden>
                      @if($user->division == 0)
                          管理者
                      @elseif($user->division == 1)
                          WEB事業部/HP制作事業部
                      @elseif($user->division == 2)
                          P管理事業部/マーケティング事業部
                      @elseif($user->division == 3)
                          P管理事業部/動画事業部
                      @elseif($user->division == 4)
                          WEB事業部/メディア事業部
                      @endif
                    </a>
              </td>
              <td>
                  {!! Form::submit('保存', ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection