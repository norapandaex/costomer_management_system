@extends('layouts.app')

@section('content')
    <h1 class="mt-4">コスト管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Cost</li>
    </ol>
    
    <div class="col-12">&nbsp;</div>

      {!! Form::open(['route' => 'costs.store']) !!}

        <div class="form-row">
          <div class="form-group col-md-6">
            {!! Form::label('day', '日付') !!}
            <input type="date" name="day" class="form-control">
          </div>
          <div class="form-group col-md-6">
            {!! Form::label('cost', '金額') !!}
            {!! Form::text('cost', null, ['class' => 'form-control', 'reqired']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('content', '内容') !!}
          {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '4', 'FlexTextarea__textarea', 'id' => 'FlexTextarea']) !!}
        </div>

        <div class="col-12">&nbsp;</div>
        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}&nbsp;&nbsp;
      {!! Form::close() !!}
    
    <table class="table table-bordered table-hover table-sm" id="sales">
        <thead>
            <tr>
                <th>日付</th>
                <th>金額</th>
                <th>内容</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($costs as $cost)
            <tr>
                <td>{{$cost->day}}</td>
                <td>{{$cost->cost}}</td>
                <td>{{$cost->content}}</td>
                <td>
                  {!! Form::open(['route' => ['costs.destroy', $cost->id], 'method' => 'delete']) !!}
                    {!! link_to_route('costs.edit', '編集', ['cost' => $cost->id], ['class' => 'btn btn-primary btn-sm']) !!}&nbsp;&nbsp;
                    {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                  {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection