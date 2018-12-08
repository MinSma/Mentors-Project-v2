@extends('layouts.main')
@section('title', 'Users')
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
    <h1>Studento Informacija</h1>

    <h3>Vardas:</h3><?php echo $student->first_name ?>
    <h3>Pavardė:</h3><?php echo $student->last_name ?>
    <h3>Elektroninio pašto adresas:</h3><?php echo $student->email ?>
    <h3>Lytis:</h3><?php echo $student->gender ?>
    <h3>Amžius:</h3><?php echo $student->age ?>
    <h3>Miestas:</h3><?php echo $student->city ?>

@endsection