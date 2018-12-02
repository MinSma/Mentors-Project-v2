@section('title', 'Mentor Panel Block')
@include('guestPagesLayouts.homeHeaderIncludes')

@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Blokuoti</p>
                </div>
                <div class="panel-body">
                    <form action="{{route('mentors.blockStore', $mentor)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="start_date">Laikorpio pradžia:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Laikorpio pabaiga:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Priežastis</label>
                            <input type="text" class="form-control" id="reason" name="reason" value="{{ old('reason') }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-small btn-info orange-bg">Blokuoti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>