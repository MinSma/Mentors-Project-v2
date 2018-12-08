@extends('layouts.main')
@section('menu')
    @include('layouts.NavPanel')
@endsection

@section('content')

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
    <form action="{{route("lessons.found")}}" method="GET" role="search">

        <div class="form-group">
            <label for="subject">Tema:</label>

            <select name="subject" id="topic" class="form-control">
                <option value="Matematika">Matematika</option>
                <option value="Anglu kalba">Anglu kalba</option>
                <option value="Informacines Technologijos">Informacines Technologijos</option>
                <option value="Chemija">Chemija</option>
                <option value="Fizika">Fizika</option>
                <option value="Biologija">Biologija</option>
                <option value="Geografija">Geografija</option>
                <option value="Istorija">Istorija</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Paieška</button>
        </div>
    </form>
@endsection