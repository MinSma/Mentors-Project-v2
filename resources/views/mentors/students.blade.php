@section('title', 'Students')

@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')

<h1 class="mb-2 text-center">Studentai, kurie priklauso Jums:</h1>
<br />
<div class="container lower">
    <div class="row">
        @foreach($students as $key => $value)
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
                                <i class="glyphicon glyphicon-user"></i>ID: {{ $value->id }}
                                <br />
                                <i class="glyphicon glyphicon-envelope"></i>{{ $value->email }}
                                <br />
                                <i class="glyphicon glyphicon-heart"></i>Lytis: {{ $value->gender }}
                                <br />
                                <i class="glyphicon glyphicon-eye-open"></i>Amžius: {{ $value->age }}
                                <br />
                                <i class="glyphicon glyphicon-globe"></i>{{ $value->city }}
                                <br />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--{{ $students->links() }}--}}
    </div>
</div>