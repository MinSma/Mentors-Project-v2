
@section('title', 'Users')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')

<h1 class="mb-2 text-center">Administratoriai</h1>
    <br />
<div class="container lower">
    <div class="row">
        @foreach($users as $key => $value)
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-5">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-7">
                        <h4 class="found-title">
                            {{ $value->name }}</h4>
                        <p>
                            <i class="glyphicon glyphicon-user"></i> ID: {{ $value->id }}
                            <br />
                            <i class="glyphicon glyphicon-envelope"></i> {{ $value->email }}
                            <br />
                        </p>
                        <div class="btn-group">
                            <div class="lower-button">
                            <a class="btn btn-small btn-info orange-bg" href="{{ URL::to('users/' . $value->id . '/edit') }}">Keisti Administratoriaus Duomenis</a>
                            </div>
                            {{ Form::open(array('url' => 'users/' . $value->id . '/delete', 'class' => 'pull-left')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Trinti Šį Administratorių', array('class' => 'btn btn-small btn-info orange-bg')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $users->links() }}
    </div>
</div>

                