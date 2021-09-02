@extends('layouts.app')

@section('content')
<h1 class="mt-4">{{$sponser->costomer->name}}のスポンサー詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Costomer</li>
</ol>
<div class="row align-items-center">
    <div class="col-10 offset-1">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        {!! link_to_route('costomers.sponser_show', 'スポンサー詳細', ['id' => $sponser->id], ['class' => 'nav-link active']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.payment', '入金管理', ['id' => $sponser->id], ['class' => 'nav-link']) !!}
                    </li>
                </ul>
            </div><br>
            
            <?php
                $profit = $sponser->cost * $sponser->rate / 100;
            ?>

            <div class="col-10 offset-1">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>スポンサー名</th>
                            <td>{{ $sponser->name }}</td>
                        </tr>
                        <tr>
                            <th>スポンサー費</th>
                            <td>{{$sponser->cost}}</td>
                        </tr>
                        <tr>
                          <th>入金済み金額</th>
                          <td>{{$sum}}</td>
                        </tr>
                        <tr>
                            <th>手数料</th>
                            <td>{{$profit}}</td>
                        </tr>
                        <tr>
                            <th>利率(％)</th>
                            <td>{{ $sponser->rate }}</td>
                        </tr>
                        <tr>
                            <th>開始日</th>
                            <td>{{ $sponser->start }}</td>
                        </tr>
                        <tr>
                            <th>終了日</th>
                            <td>{{ $sponser->stop }}</td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div align="center">
                {!! Form::open(['route' => ['costomers.sponser_destroy', $sponser->id], 'method' => 'delete']) !!}
                {!! link_to_route('costomers.sponser_edit', '編集', ['id' => $sponser->id, 'costomer' => $sponser->costomer_id], ['class' => 'btn btn-info btn-lg']) !!}&nbsp;&nbsp;
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-lg']) !!}&nbsp;&nbsp;
                {!! link_to_route('costomers.sponser', '戻る', ['id' => $sponser->costomer_id], ['class' => 'btn btn-primary btn-lg']) !!}
                {!! Form::close() !!}
            </div><br>

        </div><br>

    </div>
</div>
@endsection