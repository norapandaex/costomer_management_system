@extends('layouts.app')

@section('content')
    <h1 class="mt-4">PV数編集</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Schedule</li>
    </ol>
    <div class="row align-items-center">
                
                <div class="col-8 offset-2">
                    {!! Form::model($pv, ['route' => ['sites.pv_update', $pv->id, $site->id], 'method' => 'put']) !!}
                    
                        <div class="form-group">
                            {!! Form::label('day', '日付') !!}
                            <input type="date" name="day" class="form-control" value="{{ $pv->day }}">
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('pv', 'PV数') !!}
                            {!! Form::number('pv', $pv->pv, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div align="center">
                            {!! link_to_route('sites.pv', '戻る', ['id' => $site->id], ['class' => 'btn btn-primary']) !!}
                            {!! Form::submit('保存', ['class' => 'btn btn-info']) !!}
                        </div>
                        
                    {!! Form::close() !!}
                </div><br><br>
            </div><br>
        </div>
    </div>
 
@endsection