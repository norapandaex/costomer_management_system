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
                        {!! link_to_route('sites.pv', 'pv数', ['id' => $site->id], ['class' => 'nav-link active']) !!}
                    </li>
                    <li class="nav-item">
                        {!! link_to_route('sales.edit', '売り上げ設定', ['id' => $site->id], ['class' => 'nav-link']) !!}
                    </li>
                </ul>
            </div><br>

            @include('commons.error_messages')

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
                <?php 
                $i = 0;
                ?>
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
                            <td>
                                {!! Form::open(['route' => ['sites.pv_destroy', ['id' => $pv->id, 'site' => $site->id]], 'method' => 'delete']) !!}
                                {!! link_to_route('sites.pv_edit', '編集', ['id' => $pv->id, 'site' => $site->id], ['class' => 'btn btn-primary']) !!}&nbsp;&nbsp;
                                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        <?php
                        if (count($pvs) > 0) {
                            $pvdata[] = $pv->pv;
                            $daydata[] = $pv->day;

                            if($i == 0)
                            {
                            $max = $pv->pv;
                            $i = 1;
                            }

                            if($i == 1){
                                $pv = $pv->pv;
                                if($max < $pv){
                                    $max = $pv;
                                }
                            }

                            $varJsPv = json_encode($pvdata);
                            $varJsDay = json_encode($daydata);
                        }
                        ?>
                        @endforeach
                    </tbody>
                </table>
            </div><br>
        </div><br>
    </div>
</div>

@if(count($pvs) > 0)
<script type="text/javascript">
    var pvs = JSON.parse('<?php echo $varJsPv; ?>');
    var days = JSON.parse('<?php echo $varJsDay; ?>');
    var max = JSON.parse('<?php echo $max; ?>');
</script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('/js/chart-area-demo.js') }}"></script>

@endsection