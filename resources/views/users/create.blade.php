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
                    <label for="name">Vardas:</label>
                    <input type="text" class="form-control" id="name"  name="name" value="{{ old('name') }}" required>
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
                    <button type="submit" class="btn btn-primary">Kurti</button>
                </div>
            </form>
        </div>
    </div>
@endsection