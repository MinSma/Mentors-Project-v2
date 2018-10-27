@include('guestPagesLayouts.homeHeaderIncludes')
@include('guestPagesLayouts.homeNavigation')
@include('guestPagesLayouts.homeHeaderSection')
<h1 class="mb-2 text-center">Pamokos sukūrimas</h1>

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
                    <p class="panel-title">Pamokos sukūrimas</p>
                </div>
                <div class="panel-body">
                    <form action="{{route('lessons.store')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="level">Lygis:</label>

                            <select name="level" id="level" class="form-control">
                                <option value="Pradedantiesiems" @if (old('topic') == "Pradedantiesiems") {{ 'selected' }}   @endif>Pradedantiesiems</option>
                                <option value="Vidutinių žinių"     @if (old('topic') == "Vidutinių žinių") {{ 'selected' }}       @endif>Vidutinių žinių</option>
                                <option value="Pažengusiems" @if (old('topic') == "Pažengusiems") {{ 'selected' }} @endif>Pažengusiems</option>
                                <option value="Visų Lygių"   @if (old('topic') == "Visų Lygių") {{ 'selected' }}     @endif>Visų Lygių</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">Mokymo sritis:</label>

                            <select name="subject" id="subject" class="form-control">
                                <option value="Matematika" @if (old('topic') == "Matematika") {{ 'selected' }}   @endif>Matematika</option>
                                <option value="Anglu kalba"     @if (old('topic') == "Anglu kalba") {{ 'selected' }}       @endif>Anglu kalba</option>
                                <option value="Informacines Technologijos" @if (old('topic') == "Informacines Technologijos") {{ 'selected' }} @endif>Informacines Technologijos</option>
                                <option value="Chemija"   @if (old('topic') == "Chemija") {{ 'selected' }}     @endif>Chemija</option>
                                <option value="Fizika"     @if (old('topic') == "Fizika") {{ 'selected' }}       @endif>Fizika</option>
                                <option value="Biologija"     @if (old('topic') == "Biologija") {{ 'selected' }}       @endif>Biologija</option>
                                <option value="Geografija"   @if (old('topic') == "Geografija") {{ 'selected' }}     @endif>Geografija</option>
                                <option value="Istorija"     @if (old('topic') == "Istorija") {{ 'selected' }}       @endif>Istorija</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Trumpas aprašymas:</label>
                            <input type="text" class="form-control" id="description"  name="description" value="{{ old('description') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Kvalifikacija</label>
                            <input type="text" class="form-control" id="qualification"  name="qualification" value="{{ old('qualification') }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-small btn-info orange-bg">Sukurti pamoką</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

