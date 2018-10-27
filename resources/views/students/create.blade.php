@include('guestPagesLayouts.homeHeaderIncludes')
@include('guestPagesLayouts.homeNavigation')
@include('guestPagesLayouts.homeHeaderSection')
<h1 class="mb-2 text-center">Studento registracija</h1>

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
                    <p class="panel-title">Studento registracija</p>
                </div>
                <div class="panel-body">
            <form action="{{route('students.store')}}" method="post">
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
                    <label for="password_confirmation">Slaptažodio patvirtinimas:</label>
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
                    <input type="text" class="form-control" id="age"  name="age" value="{{ old('age') }}" required>
                </div>

                <div class="form-group">
                    <label for="city">Miestas:</label>
                    <input type="text" class="form-control" id="city"  name="city" value="{{ old('city') }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-small btn-info orange-bg">Registracija</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

