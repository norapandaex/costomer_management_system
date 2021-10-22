@extends('layouts.app')

@section('content')
<h1 class="mt-4">顧客詳細</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Costomer</li>
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
                      {!! link_to_route('costomers.sponser', 'スポンサー管理', ['id' => $costomer->id], ['class' => 'nav-link active']) !!}
                    </li>
                </ul>
            </div>
            <div class="card-body">
              {!! link_to_route('costomers.sponser_create', 'スポンサー登録', ['id' => $costomer->id], ['class' => 'btn btn-info']) !!}
              <div class="col-12">&nbsp;</div>
                <table class="table table-bordered table-hover" id="schedules">
                  <thead>
                      <tr>
                          <th>スポンサー名</th>
                          <th>スポンサー費</th>
                          <th>手数料</th>
                          <th>契約開始日</th>
                          <th>詳細</th>
                      </tr>
                  </thead>
                  <tbody class="text-center">
                      @foreach ($sponsers as $sponser)
                        <?php
                            $profit = $sponser->cost * $sponser->rate / 100;
                        ?>
                        <tr>
                            <td>{{$sponser->name}}</td>
                            <td>{{$sponser->cost}}</td>
                            <td>{{$profit}}</td>
                            <td>{{$sponser->start}}</td>
                            <td>{!! link_to_route('costomers.sponser_show', '詳細', ['id' => $sponser->id], ['class' => 'btn btn-primary']) !!}</td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection