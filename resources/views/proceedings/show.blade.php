@extends('layouts.app')

@section('content')
<h1 class="mt-4">顧客詳細</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Costomer</li>
</ol>
<div class="row align-items-center">
  <div class="col-8 offset-2">
    <table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <th>予定日時</th>
          <td>{{ $proceeding->day }}</td>
        </tr>
        <tr>
          <th>内容</th>
          <td>
            <p class="mb-0" style="text-align: left;">{!! nl2br(e($proceeding->content)) !!}</p>
          </td>
        </tr>
        </tr>
      </tbody>
    </table><br>
    <div align="center">
      {!! Form::open(['route' => ['proceedings.destroy', $proceeding->id], 'method' => 'delete']) !!}
      {!! link_to_route('proceedings.edit', '編集', ['id' => $proceeding->id], ['class' => 'btn btn-info btn-lg']) !!}&nbsp;&nbsp;
      {!! Form::submit('削除', ['class' => 'btn btn-danger btn-lg']) !!}&nbsp;&nbsp;
      <input type="button" class="btn btn-primary btn-lg" onclick="window.history.back();" value="戻る">
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection