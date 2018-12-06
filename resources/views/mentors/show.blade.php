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

<div class="container lower">
    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-xs-6 col-sm-5 col-md-5">
                    Mentoriaus Informacija
                        <h4 class="found-title">
                            {{ $mentor->first_name }} {{ $mentor->last_name }}</h4>
                        <small><cite title="{{ $mentor->city }}">{{ $mentor->city }} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{ $mentor->email }}
                            <br />
                            <i class="glyphicon glyphicon-user"></i>Gimimo data: {{ $mentor->birthday }}
                            <br />
                            <i class="glyphicon glyphicon-pencil"></i>Įvertinimas: {{ $mentor->rating }}
                            <br />
                            <i class="glyphicon glyphicon-phone"></i>Telefono numeris: {{ $mentor->phone }}
                            <br />
                            <i class="glyphicon glyphicon-text-size"></i>Trumpai apie: {{ $mentor->about }}
                        </p>
                        <div class="btn-group">
                        <div class="">
                            @if(Auth::guard('student')->check() || !Auth::guest())
                            <a class="btn btn-small btn-info orange-bg" href="{{ route('mentors.appointments', ['mentor' => $mentor]) }}">Užsiėmimai</a>
                            @endif
                            </div>              
                        </div>
                    </div>
                     <div class="col-xs-12 col-sm-4 col-md-4">
                         @if(Auth::guard('student')->check() || !Auth::guest())
                             <form method="POST" action="{{route('rating.store', $mentor)}}">
                                 {{ csrf_field() }}
                                 <select name="rating" id="rating" class="form-control">
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                 </select>
                                 <br />
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-small btn-info orange-bg">Vertinti</button>
                                 </div>
                             </form>
                             @if (Auth::guard('web')->check())
                                 {{ Form::open(array('url' => 'mentors/' . $mentor->id . '/resetrating', 'class' => 'pull-left')) }}
                                 {{ Form::hidden('_method', 'GET') }}
                                 {{ Form::submit('Anuliuoti Vertinimą', array('class' => 'btn btn-small btn-info orange-bg')) }}
                                 {{ Form::close() }}
                             @endif

                             <form method="POST" action="{{ route('comments.store', $mentor) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea name="body" placeholder="Jūsų komentaras." class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-small btn-info orange-bg">Komentuoti</button>
                                </div>
                            </form> 
                         @endif
                         @if($mentor->comments != null)
                             Komentarai
                             @foreach($mentor->comments as $comment)
                                     <div>
                                         <b>{{$mentor->email}} {{$comment->created_at->diffForHumans()}}</b>
                                         @if (Auth::guard('web')->check())
                                             {{ Form::open(array('url' => 'comments/' . $comment->id, 'class' => 'pull-right')) }}
                                             {{ Form::hidden('_method', 'DELETE') }}
                                             {{ Form::submit('Ištrinti', array('class' => 'btn btn-small btn-info orange-bg')) }}
                                             {{ Form::close() }}
                                         @endif
                                         <br>
                                         {{$comment->body}}
                                     </div>
                             @endforeach
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    