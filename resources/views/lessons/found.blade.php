    @include('guestPagesLayouts.homeHeaderIncludes')
    @include('layouts.NavPanel')
    @include('guestPagesLayouts.homeHeaderSection')
<div class="container lower">
    <div class="row">
    @foreach($lessons as $lesson)
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-5">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-7">
                        <h4 class="found-title">
                            {{ $lesson->first_name }} {{ $lesson->last_name }}</h4>
                        <small><cite title="{{ $lesson->city }}">{{ $lesson->city }} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{ $lesson->email }}
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><span class="orange">{{ $lesson->topic }}</span>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>{{ $lesson->fixed_hour_price }}
                            <br />
                            <i class="glyphicon glyphicon-user"></i>Amžius: {{ $lesson->age }}
                            <br />
                            <i class="glyphicon glyphicon-pencil"></i>Įvertinimas: {{ $lesson->rating }}
                            <br />
                        </p>
                        <div class="btn-group">
                            <a class="btn btn-small btn-info orange-bg" href="{{ URL::to('lesson/' . $lesson->id ) }}">Profilis</a>
                        </div>
                        @if(Auth::guard('student')->check() || !Auth::guest())
                            <div class="btn-group">
                                <a class="btn btn-small btn-info orange-bg" href="{{ route('students.touchMentors') }}">Susisiekti su mentoriumi</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    {{ $lessons->appends(Request::only('topic'))->links() }}
    </div>
</div>

