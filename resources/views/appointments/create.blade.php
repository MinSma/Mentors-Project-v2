@include('guestPagesLayouts.homeHeaderIncludes')
@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
<h1 class="mb-2 text-center">Užsiėmimo sukūrimas</h1>

@if(session('message'))
    <div class='alert alert-success'>
        {{ session('message') }}
    </div>
@endif

<br />
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Užsiėmimo sukūrimas</p>
                </div>
                <div class="panel-body">
                    <form action="{{route('appointments.store')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="date">Data:</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="time">Laikas:</label>
                            <input type="time" name="time" id="time" class="form-control" value="{{ old('time') }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="duration">Trukmė:</label>
                            <input type="number" class="form-control" id="duration"  name="duration" value="{{ old('duration') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Kaina:</label>
                            <input type="number" class="form-control" id="price"  name="price" value="{{ old('price') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Tipas:</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Pradedantiesiems" @if (old('topic') == "Pradedantiesiems") {{ 'selected' }}   @endif>Pradedantiesiems</option>
                                <option value="Vidutinių žinių"     @if (old('topic') == "Vidutinių žinių") {{ 'selected' }}       @endif>Vidutinių žinių</option>
                                <option value="Pažengusiems" @if (old('topic') == "Pažengusiems") {{ 'selected' }} @endif>Pažengusiems</option>
                                <option value="Visų Lygių"   @if (old('topic') == "Visų Lygių") {{ 'selected' }}     @endif>Visų Lygių</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="resources">Medžiaga:</label>
                            <input type="checkbox" class="form-control" id="resources"  name="resources" value="{{ old('resources') }}" required>

                        </div>

                        <div class="form-group">
                            <label for="place">Vieta</label>
                            <input type="text" class="form-control" id="place"  name="place" value="{{ old('place') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="additional_cost">Papildoma kaina</label>
                            <input type="number" class="form-control" id="additional_cost"  name="additional_cost" value="{{ old('additional_cost') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="max_distances">Atstumas</label>
                            <input type="number" class="form-control" id="max_distances"  name="max_distances" value="{{ old('max_distances') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="language">Kalba</label>
                            <input type="text" class="form-control" id="language"  name="language" value="{{ old('language') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="additional_info">Papildoma info</label>
                            <input type="text" class="form-control" id="additional_info"  name="additional_info" value="{{ old('additional_info') }}" required>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
