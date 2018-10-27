@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
@section('title', 'Login Panel')
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Keiskite slaptažodį</p>
                </div>
                <div class="panel-body">

    <form id="form-change-password" role="form" method="POST" action="{{ url('/students/dashboard/change') }}" novalidate class="form-horizontal">
        <div class="col-md-9">
            <label for="current-password" class="col-sm-4 control-label">Esamas Slaptažodis</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Slaptažodis">
                </div>
            </div>
            <label for="password" class="col-sm-4 control-label">Naujas Slaptažodis</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Slaptažodis">
                </div>
            </div>
            <label for="password_confirmation" class="col-sm-4 control-label">Naujo Slaptažodio Patvirtinimas</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Slaptažodžio Patvirtinimas">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-6">
                <button type="submit" class="btn btn-small btn-info orange-bg">Keisti</button>
            </div>
        </div>
    </form>
            </div>
        </div>
    </div>
</div>
