@extends('layouts.app')

@section('content')
    <h1 class="mt-4">サイト管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    
    {!! link_to_route('sites.create', '登録', [], ['class' => 'btn btn-info btn-lg']) !!}
    
    <div class="col-12">&nbsp;</div>
    
    <table class="table table-bordered table-hover" id="schedules">
        <thead>
            <tr>
                <th>チーム名</th>
                <th>サイト名</th>
                <th>サイトURL</th>
                <th>契約日</th>
                <th>公開日</th>
                <th>内部制作担当</th>
                <th>内部運営担当</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($sites as $site)
            <tr>
                <td>{{ $site->costomer->name }}</td>
                <td>{{ $site->name }}</td>
                <td><a href="{{ $site->url }}">{{ $site->url }}</a></td>
                <td>{{ $site->contract_day }}</td>
                <td>{{ $site->open }}</td>
                <td>{{ $site->inside_staff }}</td>
                <td>{{ $site->outside_staff }}</td>
                <td>{!! link_to_route('sites.show', '詳細', ['site' => $site->id], ['class' => 'btn btn-primary']) !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection