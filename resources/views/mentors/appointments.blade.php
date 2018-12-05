@section('title', 'Susitikimai')
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

<h1 class="mb-2 text-center">Susitikimai</h1>
<br/>
<div class="container lower">
    <div class="row">
        @foreach($appointments as $key => $value)
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-7">
                            <p>
                                <i class="glyphicon glyphicon-user"></i>Data: {{ $value->date }}
                                <br/>
                                <i class="glyphicon glyphicon-envelope"></i>Laikas: {{ $value->time }}
                                <br/>
                                <i class="glyphicon glyphicon-heart"></i>Trukmė: {{ $value->duration }}
                                <br/>
                                <i class="glyphicon glyphicon-eye-open"></i>Kaina: {{ $value->price }} EU
                                <br/>
                                <i class="glyphicon glyphicon-globe"></i>Tipas: {{ $value->type }}
                                <br/>
                                <i class="glyphicon glyphicon-book"></i>Vieta: {{ $value->place }}
                                <br/>
                                <i class="glyphicon glyphicon-fire"></i>Papildoma kaina: {{ $value->additional_cost }} EU
                                <br/>
                                <i class="glyphicon glyphicon-fire"></i>Papildoma medžiaga: {{ $value->resources == 1 ? 'Taip' : 'Ne' }}
                                <br/>
                                <i class="glyphicon glyphicon-pencil"></i>Atstumas: {{ $value->max_distances }}
                                <br/>
                                <i class="glyphicon glyphicon-pencil"></i>Būsena: {{ $value->state }}
                                <br/>
                                <i class="glyphicon glyphicon-pencil"></i>Kalba: {{ $value->language }}
                                <br/>
                                <i class="glyphicon glyphicon-pencil"></i>Papildoma informacija: {{ $value->additional_info }}
                                <br/>
                            </p>
                        </div>
                        <div class="btn-group col-xs-4 col-sm-4 col-md-5">
                            @if (Auth::guard('web')->check() || Auth::guard('mentor')->check())
                                <div class="lower-button">
                                    <a class="btn btn-small btn-info orange-bg"
                                       href="{{ URL::to('appointments/' . $value->id . '/edit') }}">Keisti Susitikimo Duomenis</a>
                                </div>

                                {{ Form::open(array('url' => 'appointments/' . $value->id . '/delete', 'class' => 'pull-left')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Ištrinti Susitikimą', array('class' => 'btn btn-small btn-info orange-bg')) }}
                                {{ Form::close() }}
                            @endif
                            @if (Auth::guard('student')->check())
                                <a class="btn btn-small btn-info orange-bg" href="{{ route('reservation.store', ['mentor' => $value]) }}">Rezervuoti</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>