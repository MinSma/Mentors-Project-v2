    @include('guestPagesLayouts.homeHeaderIncludes')
    @include('guestPagesLayouts.homeNavigation')
    @include('guestPagesLayouts.homeHeaderSection')

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
                            <i class="glyphicon glyphicon-globe"></i><span class="orange">{{ $mentor->topic }}</span>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>{{ $mentor->fixed_hour_price }} 
                            <br />
                            <i class="glyphicon glyphicon-user"></i>Amžius: {{ $mentor->age }}
                            <br />
                            <i class="glyphicon glyphicon-pencil"></i>Įvertinimas: {{ $mentor->rating }}
                        </p>
                        <div class="btn-group">
                        <div class=""> 
                            @if(Auth::guard('student')->check() || !Auth::guest())
                            <a class="btn btn-small btn-info orange-bg" href="{{ route('reservation.store', $mentor) }}">Užsirašyti</a>
                            <a class="btn btn-small btn-info orange-bg" href="{{ route('reservation.unstore', $mentor) }}">Išsiregistruoti</a>
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
                                 <div>{{$comment->body}} {{$comment->created_at->diffForHumans()}}</div>
                             @endforeach
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    