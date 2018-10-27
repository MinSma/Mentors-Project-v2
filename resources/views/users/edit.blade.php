
@section('title', 'Admin Panel Edit')
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

    {{ Form::model($user, array('route' => array('users.update', $user), 'method' => 'PUT')) }}

    <div class="form-group">
        {!! Form::label('name', 'Vardas', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Elektroninio Pašto Adresas:', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::hidden('id', $user->id) !!}

    {!! Form::submit('Keisti', ['class' => 'btn btn-small btn-info orange-bg']) !!}

    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
