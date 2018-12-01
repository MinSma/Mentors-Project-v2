@include('guestPagesLayouts.homeHeaderIncludes')
@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')
<h1 class="mb-2 text-center">Studento registracija</h1>

@if(session('message'))
    <div class='alert alert-success'>
        {{ session('message') }}
    </div>
@endif

<br/>
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
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   value="{{ old('first_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Pavardė:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   value="{{ old('last_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Elektroninio pašto adresas:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="password">Slaptažodis:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Slaptažodio patvirtinimas:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Lytis:</label>

                            <select name="gender" id="gender" class="form-control">
                                <option value="vyras" @if (old('gender') == "Vyras") {{ 'selected' }}       @endif>
                                    Vyras
                                </option>
                                <option value="moteris" @if (old('gender') == "Moteris") {{ 'selected' }}     @endif>
                                    Moteris
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city">Miestas:</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="address">Adresas:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{ old('address') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="birthday">Gimimo data:</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                   value="{{ old('birthday') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="education">Išsilavinimas</label>
                            <select name="education" id="education" class="form-control">
                                <option value="pradinis" @if (old('education') == "Pradinis") {{ 'selected' }}       @endif>
                                    Pradinis
                                </option>
                                <option value="pagrindinis" @if (old('education') == "Pagrindinis") {{ 'selected' }}       @endif>
                                    Pagrindinis
                                </option>
                                <option value="vidurinis" @if (old('education') == "Vidurinis") {{ 'selected' }}       @endif>
                                    Vidurinis
                                </option>
                                <option value="aukstasis" @if (old('education') == "Aukštasis") {{ 'selected' }}     @endif>
                                    Aukštasis
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefono numeris:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-small btn-info orange-bg">Registracija</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>