
@section('title', 'Papildymai')
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

<h1 class="mb-2 text-center">Papildymai</h1>
<br />
<div class="container lower">
    <div class="row">
        @foreach($askings as $key => $value)
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-5">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-7">
                            <h4 class="found-title">
                                {{ $value->id }}</h4>
                            <p>
                                <i class="glyphicon glyphicon-user"></i> Turima suma: {{ $value->amount }}
                                <br />
                                <i class="glyphicon glyphicon-envelope"></i> Prasymas papildyti: {{ $value->askings }}
                            </p>
                            <div class="btn-group">
                                <div class="lower-button">
                                    <a class="btn btn-small btn-info orange-bg" href="{{ route('users.confirmAskings', ['bankAccount' => $value])}}">Patvirtinti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

