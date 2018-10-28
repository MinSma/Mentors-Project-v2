@section('title', 'Mentoriai')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')


<h1 class="mb-2 text-center">Pamokos</h1>
<br/>
<div class="container lower">
    <div class="row">
        {{--@foreach($lessons as $key => $value)--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                {{--<div class="well well-sm">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
                            {{--<p>--}}
                                {{--<i class="glyphicon glyphicon-user"></i>ID: {{ $value->id }}--}}
                                {{--<br/>--}}
                                {{--<i class="glyphicon glyphicon-envelope"></i>Lygis: {{ $value->level }}--}}
                                {{--<br/>--}}
                                {{--<i class="glyphicon glyphicon-heart"></i>Mokymo sritis: {{ $value->subject }}--}}
                                {{--<br/>--}}
                                {{--<i class="glyphicon glyphicon-eye-open"></i>Aprašymas: {{ $value->description }}--}}
                                {{--<br/>--}}
                                {{--<i class="glyphicon glyphicon-globe"></i>Kvalifikacija: {{ $value->qualification }}--}}
                                {{--<br/>--}}
                            {{--</p>--}}
                            {{--<div class="flex-between">--}}
                                {{--<div class="btn-group">--}}

                                    {{--{{ Form::open(array('url' => 'lessons/' . $value->id . '/delete', 'class' => 'pull-left')) }}--}}
                                    {{--{{ Form::hidden('_method', 'DELETE') }}--}}
                                    {{--{{ Form::submit('Ištrinti Pamoką', array('class' => 'btn btn-small btn-info orange-bg')) }}--}}
                                    {{--{{ Form::close() }}--}}

                                {{--</div>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a class="btn btn-small btn-info orange-bg"--}}
                                       {{--href="{{ route('appointments.dashboard') }}">Parodyti užsiėmimus</a>--}}
                                {{--</div>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a class="btn btn-small btn-info orange-bg"--}}
                                       {{--href="{{ route('appointments.create') }}">Pridėti--}}
                                        {{--užsiėmimą</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    </div>
</div>