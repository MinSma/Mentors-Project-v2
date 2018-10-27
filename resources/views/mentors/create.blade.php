@include('guestPagesLayouts.homeHeaderIncludes')
@include('guestPagesLayouts.homeNavigation')
@include('guestPagesLayouts.homeHeaderSection')
<h1 class="mb-2 text-center">Mentoriaus registracija</h1>

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
                    <p class="panel-title">Mentoriaus registracija</p>
                </div>
                <div class="panel-body">
            <form action="{{route('mentors.store')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="first_name">Vardas:</label>
                    <input type="text" class="form-control" id="first_name"  name="first_name" value="{{ old('first_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Pavardė:</label>
                    <input type="text" class="form-control" id="last_name"  name="last_name" value="{{ old('last_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Elektroninio pašto adresas:</label>
                    <input type="email" class="form-control" id="email"  name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Slaptažodis:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Slaptažodžio patvirtinimas:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="form-group">
                    <label for="gender">Lytis:</label>

                    <select name="gender" id="gender" class="form-control">
                        <option value="vyras"     @if (old('gender') == "Vyras") {{ 'selected' }}       @endif>Vyras</option>
                        <option value="moteris"   @if (old('gender') == "Moteris") {{ 'selected' }}     @endif>Moteris</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age">Amžius:</label>
                    <input type="number" class="form-control" id="age"  name="age" value="{{ old('age') }}" required>
                </div>

                <div class="form-group">
                    <label for="city">Miestas:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                </div>

                <div class="form-group">
                    <label for="topic">Tema:</label>

                    <select name="topic" id="topic" class="form-control">
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
                    <label for="fixed_hour_price">Valandinis įkainis:</label>
                    <input type="text" class="form-control" id="fixed_hour_price"  name="fixed_hour_price" value="{{ old('fixed_hour_price') }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-small btn-info orange-bg">Registruotis</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

