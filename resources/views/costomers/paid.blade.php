@extends('layouts.app')

@section('content')
    <h1 class="mt-4">顧客管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Costomer</li>
    </ol>
    
    <div class="col-12">&nbsp;</div>

    <div class="card">
      <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                  {!! link_to_route('costomers.operatingList', '未入金', [], ['class' => 'nav-link']) !!}
              </li>
              <li class="nav-item">
                  {!! link_to_route('costomers.paidList', '入金済み', [], ['class' => 'nav-link active']) !!}
              </li>
          </ul>
      </div>
      <div class="col-10 offset-1">
        <div class="col-12">&nbsp;</div>
          <table class="table table-bordered table-hover" id="defo">
            <thead>
                <tr>
                    <th>支払月</th>
                    <th>チーム名</th>
                    <th>サイト名</th>
                    <th>運営費</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($operatings as $operating)
                <tr>
                  <td>{{ $operating->day }}</td>
                  <td>{{ $operating->site->costomer->name }}</td>
                  <td>{{ $operating->site->name }}</td>
                  <td>{{ $operating->site->operating_cost }}</td>
                  <td>
                    {!! Form::open(['route' => ['costomers.pay', $operating->id], 'method' => 'put']) !!}
                      {!! Form::submit('未入金に戻す', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div><br>
    
@endsection