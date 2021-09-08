@extends('layouts.app')

@section('content')
<h1 class="mt-4">サイト詳細</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Schedule</li>
</ol>
<div class="row align-items-center">
  <div class="col-10 offset-1">
    <div class="card text-center">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            {!! link_to_route('sites.show', 'サイト詳細', ['site' => $site->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('sites.pv', 'pv数', ['id' => $site->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('sales.edit', '売り上げ設定', ['id' => $site->id], ['class' => 'nav-link']) !!}
          </li>
          <li class="nav-item">
            {!! link_to_route('sales.addition_index', '追加作業費', ['id' => $site->id], ['class' => 'nav-link active']) !!}
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div align="center">
          <div class="col-8">
            @include('commons.error_messages')

            <h3>追加作業費</h3>
            <div class="col-8">
              {!! Form::open(['route' => ['sales.addition_create', 'id' => $site->id]]) !!}
    
                <div class="form-group">
                  {!! Form::label('day', '入金日') !!}
                  <input type="date" name="day" class="form-control">
                </div>
    
                <div class="form-group">
                  {!! Form::label('cost', '金額') !!}
                  {!! Form::text('cost', null, ['class' => 'form-control', 'reqired']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('content', '内容') !!}
                  {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '5', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
                </div>
    
                <div class="col-12">&nbsp;</div>
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
                <div class="col-12">&nbsp;</div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
          <div class="col-12">
            <table class="table table-bordered table-hover table-sm" id="sales">
              <thead>
                  <tr>
                      <th>売り上げ月</th>
                      <th>金額</th>
                      <th>内容</th>
                      <th>詳細</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($additions as $addition)
                    <tr>
                      <td>{{$addition->day}}</td>
                      <td>{{$addition->cost}}</td>
                      <td style="text-align: left;">{!! nl2br(e($addition->content)) !!}</td>
                      <td>
                        {!! Form::open(['route' => ['sales.addition_destroy', ['id' => $addition->id]], 'method' => 'delete']) !!}
                        {!! link_to_route('sales.addition_edit', '編集', ['id' => $addition->id], ['class' => 'btn btn-primary']) !!}&nbsp;&nbsp;
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div><br>
    </div>
  </div>
</div>
@endsection
        