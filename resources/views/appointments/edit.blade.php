@include('guestPagesLayouts.homeHeaderIncludes')
@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
<h1 class="mb-2 text-center">Užsiėmimo duomenų keitimas</h1>

@if(session('message'))
    <div class='alert alert-success'>
        {{ session('message') }}
    </div>
@endif

<br />
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Užsiėmimo duomenų keitimas</p>
                </div>
                <div class="panel-body">
                    {{ Form::model($appointment, array('route' => array('appointments.update', $appointment), 'method' => 'PUT')) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('date', 'Data', ['class' => 'control-label']) !!}
                            {!! Form::text('date', old('date'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time', 'Laikas', ['class' => 'control-label']) !!}
                            {!! Form::text('time', old('time'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('duration', 'Trukmė', ['class' => 'control-label']) !!}
                            {!! Form::text('duration', old('duration'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', 'Kaina', ['class' => 'control-label']) !!}
                            {!! Form::text('price', old('price'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Tipas', ['class' => 'control-label']) !!}
                            {!! Form::select('type', array(
                                'Pradedantiesiems' => 'Pradedantiesiems',
                                'Vidutinių žinių' => 'Vidutinių žinių',
                                'Pažengusiems' => 'Pažengusiems',
                                'Visų Lygių' => 'Visų Lygių'
                                ), old('topic'));
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="resources">Medžiaga:</label>
                            <input type="checkbox" class="form-control" id="resources"
                                   name="resources" value="1" required>
                        </div>

                        <div class="form-group">
                            {!! Form::label('place', 'Vieta', ['class' => 'control-label']) !!}
                            {!! Form::text('place', old('place'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('additional_cost', 'Papildoma kaina', ['class' => 'control-label']) !!}
                            {!! Form::text('additional_cost', old('additional_cost'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('max_distances', 'Atstumas', ['class' => 'control-label']) !!}
                            {!! Form::text('max_distances', old('max_distances'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('language', 'Kalba', ['class' => 'control-label']) !!}
                            {!! Form::text('language', old('language'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('additional_info', 'Papildoma info', ['class' => 'control-label']) !!}
                            {!! Form::text('additional_info', old('additional_info'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-small btn-info orange-bg">Keisti</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
