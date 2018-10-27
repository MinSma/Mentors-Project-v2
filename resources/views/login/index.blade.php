@include('guestPagesLayouts.homeHeaderIncludes')
@include('guestPagesLayouts.homeNavigation')
@include('guestPagesLayouts.homeHeaderSection')
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Prašome prisijungti</p>
                </div>
                <div class="panel-body">
                    <form action="{{route('login.connect')}}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Elektroninio pašto adresas:</label>
                            <input type="email" class="form-control" id="email"  name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Slaptažodis:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-md-4">
                                    <button type="submit" class="btn btn-small btn-info orange-bg">Prisijungti</button>
                            </div>
                            <div class="col-xs-6 col-md-8">
                                <a class="btn btn-small btn-info orange-bg" href="{{ route('mentors.create') }}">Registruoti Mentorių</a>
                                <a class="btn btn-small btn-info orange-bg" href="{{ route('students.create') }}">Registruoti Studentą</a>
                                </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

