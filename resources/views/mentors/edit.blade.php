
@section('title', 'Students Panel Edit')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
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
        {!! Form::label('age', 'Amžius:', ['class' => 'control-label']) !!}
        {!! Form::text('age', old('age'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'Miestas:', ['class' => 'control-label']) !!}
        {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('topic', 'Tema:', ['class' => 'control-label']) !!}
        {!! Form::select('topic', [
            'mathematics' => 'Mathematics',
            'english' => 'English language',
            'it' => 'Information Technology',
            'chemistry' => 'Chemistry',
            'physics' => 'Physics',
            'biology' => 'Biology',
            'geography' => 'Geography',
            'history' => 'History'
        ], old('topic'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('fixed_hour_price', 'Valandinis Įkainis:', ['class' => 'control-label']) !!}
        {!! Form::text('fixed_hour_price', old('fixed_hour_price'), ['class' => 'form-control']) !!}
    </div>

    {!! Form::hidden('id', $mentor->id) !!}

    {!! Form::submit('Keisti Mentoriaus Duomenis', ['class' => 'btn btn-small btn-info orange-bg']) !!}

    {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
