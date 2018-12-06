@section('title', 'Students Panel Edit')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')

@if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Redaguokite</p>
                </div>
                <div class="panel-body">

                    {{ Form::model($mentor, array('route' => array('mentors.update', $mentor), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {!! Form::label('first_name', 'Vardas', ['class' => 'control-label']) !!}
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', 'Pavardė', ['class' => 'control-label']) !!}
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', 'Lytis:', ['class' => 'control-label']) !!}
                        {!! Form::select('gender', [
                            'vyras' => 'Vyras',
                            'moteris' => 'Moteris'
                        ], old('topic'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('city', 'Miestas:', ['class' => 'control-label']) !!}
                        {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('birthday', 'Gimimo data:', ['class' => 'control-label']) !!}
                        {!! Form::date('birthday', old('birthday'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', 'Adresas:', ['class' => 'control-label']) !!}
                        {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('about', 'Trumpai apie save:', ['class' => 'control-label']) !!}
                        {!! Form::text('about', old('about'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', 'Telefono numeris:', ['class' => 'control-label']) !!}
                        {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::hidden('id', $mentor->id) !!}

                    {!! Form::submit('Keisti Mentoriaus Duomenis', ['class' => 'btn btn-small btn-info orange-bg']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>