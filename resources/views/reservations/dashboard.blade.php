@section('title', 'Rezervacijos')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')


<h1 class="mb-2 text-center">Rezervacijos</h1>
<br/>
<div class="container lower">
    <div class="row">
        @foreach($reservations as $key => $value)
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <p>
                                <i class="glyphicon glyphicon-user"></i>ID: {{ $value->id }}
                                <br/>
                                <i class="glyphicon glyphicon-envelope"></i>Mentoriaus ID: {{ $value->mentor_id }}
                                <br/>
                                <i class="glyphicon glyphicon-heart"></i>Aplikavimo data: {{ $value->application_date }}
                                <br/>
                                <i class="glyphicon glyphicon-eye-open"></i>Patvirtinimo data: {{ $value->confirmation_date }}
                                <br/>
                                <i class="glyphicon glyphicon-globe"></i>Statusas: {{ $value->status }}
                                <br/>
                            </p>
                            <div class="btn-group col-xs-4 col-sm-4 col-md-5">
                                @if (Auth::guard('mentor')->check() && $value->status != 'Patvirtinta')
                                    <div class="lower-button">
                                        <a class="btn btn-small btn-info orange-bg"
                                           href="{{ route('reservations.confirm', ['reservation' => $value]) }}">Patvirtinti rezervacija</a>
                                    </div>
                                @endif

                                @if (Auth::guard('student')->check() || Auth::guard('mentor')->check())
                                    {{ Form::open(array('url' => 'reservations/' . $value->id . '/delete', 'class' => 'pull-left')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Ištrinti Rezervacija', array('class' => 'btn btn-small btn-info orange-bg')) }}
                                    {{ Form::close() }}
                                @endif

                                @if (Auth::guard('student')->check() && $value->status == 'Patvirtinta')
                                        <div class="lower-button">
                                            <a class="btn btn-small btn-info orange-bg"
                                               href="{{ route('reservations.confirm', ['reservation' => $value]) }}">Apmoketi</a>
                                        </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>