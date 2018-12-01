@extends('layouts.main')
@section('title', 'Users Create')
@section('menu')
    @include('layouts.NavPanel')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <h1>Administratoriaus kūrimas</h1>

            <hr>

            <form action="{{route('users.store')}}" method="post">
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
                    <label for="password_confirmation">Slaptažodžio Patvirtinimas:</label>
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
                    <label for="city">Miestas:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Adresas:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                </div>

                <div class="form-group">
                    <label for="birthday">Gimimo data:</label>
                    <input type="date" class="form-control" id="birthday"  name="birthday" value="{{ old('birthday') }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Telefono numeris:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>

                <div class="form-group">
                    <label for="role">Rolė:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="payment_admin"     @if (old('role') == "Mokėjimų sistemos administratorius") {{ 'selected' }}       @endif>Mokėjimų sistemos administratorius</option>
                        <option value="reservation_admin"   @if (old('role') == "Rezervacijų sistemos administratorius") {{ 'selected' }}     @endif>Rezervacijų sistemos administratorius</option>
                        <option value="sys_admin"   @if (old('role') == "Sistemos administratorius") {{ 'selected' }}     @endif>Sistemos administratorius</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kurti</button>
                </div>
            </form>
        </div>
    </div>
@endsection