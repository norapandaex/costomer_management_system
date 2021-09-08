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
              {!! Form::model($addition,['route' => ['sales.addition_update', $addition->id], 'method' => 'put']) !!}
    
                <div class="form-group">
                  {!! Form::label('day', '入金日') !!}
                  <input type="date" name="day" class="form-control" value="{{$addition->day}}">
                </div>
    
                <div class="form-group">
                  {!! Form::label('cost', '金額') !!}
                  {!! Form::text('cost', $addition->cost, ['class' => 'form-control', 'reqired']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('content', '内容') !!}
                  {!! Form::textarea('content', $addition->content, ['class' => 'form-control','rows' => '5', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
                </div>
    
                <div class="col-12">&nbsp;</div>
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
                <div class="col-12">&nbsp;</div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div><br>
    </div>
  </div>
</div>
@endsection
        