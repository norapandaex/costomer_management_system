@extends('layouts.app')

@section('content')
<h1 class="mt-4">顧客詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Schedule</li>
</ol>
<div class="row align-items-center">
    <div class="col-10 offset-1">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        {!! link_to_route('costomers.show', '顧客詳細', ['costomer' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.meeting', 'ミーティングスケジュール', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('proceedings.index', 'ミーティング議事録', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.operate', '入金済み運営費', ['id' => $costomer->id], ['class' => 'nav-link active']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('costomers.sponser', 'スポンサー管理', ['id' => $costomer->id], ['class' => 'nav-link']) !!}
                    </li>
                </ul>
            </div><br>

            <div class="col-10 offset-1">
              <table class="table table-bordered table-hover"id="sales">
                <thead>
                  <tr>
                    <th>入金月</th>
                    <th>入金額</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  @foreach($paieds as $paied)
                      <tr>
                        <td>{{ $paied->day }}</td>
                        <td>
                            {{ $paied->operecord->operating_cost }}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

        </div><br>

    </div>
</div>
@endsection