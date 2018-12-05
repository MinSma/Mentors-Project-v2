@section('title', 'Mentoriai')
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

<h1 class="mb-2 text-center">Mentoriai, kuriems priklausote:</h1>
<br />
<div class="container lower">
    <div class="row">
        @if($mentors != NULL)
            @foreach($mentors as $key => $value)
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-5">
                                <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-7">
                                <h4 class="found-title">
                                    {{ $value['name'] }}</h4>
                                <p>
                                    <i class="glyphicon glyphicon-user"></i>ID: {{ $value['id'] }}
                                    <br />
                                    <i class="glyphicon glyphicon-envelope"></i>{{ $value['email'] }}
                                    <br />
                                    <i class="glyphicon glyphicon-heart"></i>Lytis: {{ $value['gender'] }}
                                    <br />
                                    <i class="glyphicon glyphicon-eye-open"></i>Amžius: {{ $value['age'] }}
                                    <br />
                                    <i class="glyphicon glyphicon-globe"></i>{{ $value['city'] }}
                                    <br />
                                    <i class="glyphicon glyphicon-book"></i>{{ $value['topic'] }}
                                    <br />
                                    <i class="glyphicon glyphicon-fire"></i>{{ $value['fixed_hour_price'] }} EU
                                    <br />
                                    <i class="glyphicon glyphicon-pencil"></i>Įvertinimas: {{ $value['rating'] }}
                                    <br />
                                </p>
                                <div class="btn-group">
                                    <a class="btn btn-small btn-info orange-bg" href="{{ URL::to('mentors/' . $value['id'] ) }}">Profilis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--{{ $mentors->links() }}--}}
        @endif
    </div>
</div>