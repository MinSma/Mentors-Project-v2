<!DOCTYPE html>
<html lang="en">
    <head>
        @section('title', 'Susisiekite su mentoriumi')
        @include('guestPagesLayouts.homeHeaderIncludes')
    </head>
    <body id="Mentors_Project" data-spy="scroll" data-target=".navbar" data-offset="60">
        @include('guestPagesLayouts.homeHeaderSection')
        @include('layouts.NavPanel')
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
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">Susisiekite su mentoriumi</p>
                        </div>
                        <div class="panel-body">
                            <form action={{ route('mentors.touchMentorsSend', $mentor) }} method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="message">Žinutė: </label>
                                    <textarea type="text" class="form-control luna-message" id="message"
                                              placeholder="Įveskite savo žinutę čia"
                                              name="message" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-small btn-info orange-bg" value="Send">Siųsti</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>