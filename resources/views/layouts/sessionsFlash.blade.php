@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

@if (isset($errors) && count($errors))
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif