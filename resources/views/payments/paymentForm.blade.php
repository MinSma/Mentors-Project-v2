@include('guestPagesLayouts.homeHeaderIncludes')
@include('layouts.NavPanel')
@include('guestPagesLayouts.homeHeaderSection')

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
<h1 class="mb-2 text-center">Papildyti saskaita</h1>

<br />
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Papildyti saskaita</p>
                </div>
                <div class="panel-body">
                    <form action="{{route('payments.ask')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="sum">Suma:</label>
                            <input type="number" class="form-control" id="sum"  name="sum" value="{{ old('sum') }}" required>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-6">
                                <button type="submit" class="btn btn-small btn-info orange-bg">Papildyti</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
