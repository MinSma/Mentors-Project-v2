    @include('guestPagesLayouts.homeHeaderIncludes')
    @include('guestPagesLayouts.homeNavigation')
    @include('guestPagesLayouts.homeHeaderSection')
<div class="container lower">
    <div class="row">
    @foreach($mentors as $mentor)
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-5">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-7">
                        <h4 class="found-title">
                            {{ $mentor->first_name }} {{ $mentor->last_name }}</h4>
                        <small><cite title="{{ $mentor->city }}">{{ $mentor->city }} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{ $mentor->email }}
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><span class="orange">{{ $mentor->topic }}</span>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>{{ $mentor->fixed_hour_price }}
                            <br />
                            <i class="glyphicon glyphicon-user"></i>Amžius: {{ $mentor->age }}
                            <br />
                            <i class="glyphicon glyphicon-pencil"></i>Įvertinimas: {{ $mentor->rating }}
                            <br />
                        </p>
                        <div class="btn-group">
                            <a class="btn btn-small btn-info orange-bg" href="{{ URL::to('mentors/' . $mentor->id ) }}">Profilis</a>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    {{ $mentors->appends(Request::only('topic'))->links() }}
    </div>
</div>

