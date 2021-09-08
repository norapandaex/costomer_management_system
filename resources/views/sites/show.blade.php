@extends('layouts.app')

@section('content')
<h1 class="mt-4">サイト詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Site</li>
</ol>
<div class="row align-items-center">
    <div class="col-10 offset-1">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        {!! link_to_route('sites.show', 'サイト詳細', ['site' => $site->id], ['class' => 'nav-link active']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('sites.pv', 'pv数', ['id' => $site->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('sales.edit', '売り上げ設定', ['id' => $site->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('sales.addition_index', '追加作業費', ['id' => $site->id], ['class' => 'nav-link']) !!}
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>チーム名</th>
                            <td>{{ $site->costomer->name }}</td>
                        </tr>
                        <tr>
                            <th>サイト名</th>
                            <td>{{ $site->name }}</td>
                        </tr>
                        <tr>
                            <th>サイトURL</th>
                            <td><a href="{{ $site->url }}">{{ $site->url }}</a></td>
                        </tr>
                        <tr>
                            <th>サイトURL</th>
                            <td><a href="{{ $site->analytics }}">{{ $site->analytics }}</a></td>
                        </tr>
                        <tr>
                            <th>公開日</th>
                            <td>{{ $site->open }}</td>
                        </tr>
                        <tr>
                            <th>契約日</th>
                            <td>{{ $site->contract_day }}</td>
                        </tr>
                        <tr>
                            <th>内部製作担当</th>
                            <td>{{ $site->inside_staff }}</td>
                        </tr>
                        <tr>
                            <th>内部運営担当</th>
                            <td>{{ $site->outside_staff }}</td>
                        </tr>
                        <tr>
                            <th>制作開始日</th>
                            <td>{{ $site->start }}</td>
                        </tr>
                        <tr>
                            <th>製作費</th>
                            <td>{{ $site->production_cost }}</td>
                        </tr>
                        <tr>
                            <th>運営費</th>
                            <td>{{ $site->operating_cost }}</td>
                        </tr>
                        <tr>
                            <th>契約内容</th>
                            <td>
                                <p class="mb-0" style="text-align: left;">{!! nl2br(e($site->contract)) !!}</p>
                            </td>
                        </tr>
                    </tbody>
                </table><br>
                <div align="center">
                    {!! Form::open(['route' => ['sites.destroy', $site->id], 'method' => 'delete']) !!}
                    {!! link_to_route('sites.edit', '編集', ['site' => $site->id], ['class' => 'btn btn-info btn-lg']) !!}&nbsp;&nbsp;
                    {!! Form::submit('削除', ['class' => 'btn btn-danger btn-lg']) !!}&nbsp;&nbsp;
                    {!! link_to_route('sites.index', '戻る', [], ['class' => 'btn btn-primary btn-lg']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection