@extends('layouts.app')

@section('content')
    <h1 class="mt-4">スケジュール詳細</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    <div class="row align-items-center">
        <div class="col-10 offset-1">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            {!! link_to_route('sites.show', 'サイト一覧', ['site' => $site->id], ['class' => 'nav-link']) !!}
                        </li>
                        <li class="nav-item">
                            {!! link_to_route('sites.pv', 'pv数', ['id' => $site->id], ['class' => 'nav-link active']) !!}
                        </li>
                    </ul>
                </div><br>
                
                <div class="col-10 offset-1">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            日別PV
                        </div>
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-8 offset-2">
                    {!! Form::open(['route' => ['sites.pv_store', 'id' => $site->id]]) !!}
                    
                        <div class="form-group">
                            {!! Form::label('day', '日付') !!}
                            <input type="date" name="day" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('pv', 'PV数') !!}
                            {!! Form::number('pv', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
                        
                    {!! Form::close() !!}
                </div><br><br>
            
                <div class="col-10 offset-1">
                    <table class="table table-bordered table-hover" id="schedules">
                        <thead>
                            <tr>
                                <th>日付</th>
                                <th>PV数</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($pvs as $pv)
                            <tr>
                                <td>{{ $pv->day }}</td>
                                <td>{{ $pv->pv }}</td>
                                <td>{{--{!! link_to_route('schedules.show', '詳細', ['id' => $schedule->id], ['class' => 'btn btn-primary']) !!}--}}</td>
                            </tr>
                            <?php
                                $pvdata[] = $pv->pv;
                                $varJsSample = json_encode($pvdata);
                            ?>
                            @endforeach
                            <?php dd($pvdata)?>
                        </tbody>
                    </table>
                </div><br>
                
            </div><br>
        </div>
    </div>
    
<script type="text/javascript">
var sample=JSON.parse('<?php echo $varJsSample; ?>');//jsonをparseしてJavaScriptの変数に代入
</script>
 
@endsection