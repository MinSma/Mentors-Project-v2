<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('guestPages.home') }}" title="Pagrindinis puslapis">
                <img style="max-width:125px; margin-top: -10px;" src="{{ asset('images/Logo_orange.png') }}">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
    @if(Auth::guard('mentor')->check())
        <li><a href="{{ route('mentors.dashboard') }}">Vartotojo Erdvė</a></li>
        <li><a href="{{ route('mentors.students') }}">Studentai</a></li>
        <li><a href="/mentors/{{ Auth::guard('mentor')->user()['id'] }}/edit">Duomenų Keitimas</a></li>
        <li><a href="{{ route('mentors.changePassword') }}">Slaptažodžio Keitimas</a></li>
        <li><a href="{{ route('login.disconnect') }}">Atsijungti</a></li>
    @elseif (Auth::guard('student')->check())
        <li><a href="{{ route('students.dashboard') }}">Vartotojo Erdvė</a></li>
        <li><a href="{{ route('students.mentors') }}">Mentoriai</a></li>
        <li><a href="/students/{{ Auth::guard('student')->user()['id'] }}/edit">Duomenų Keitimas</a></li>
        <li><a href="{{ route('students.changePassword') }}">Slaptažodžio Keitimas</a></li>
        <li><a href="{{ route('login.disconnect') }}">Atsijungti</a></li>
    @elseif (Auth::guard('web')->check())
        <li><a href="{{ route('users.dashboard') }}">Vartotojo Erdvė</a></li>
        <li><a href="/users/{{ Auth::guard('web')->user()['id'] }}/edit">Duomenų Keitimas</a></li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Mentoriai <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('mentors.index') }}">Peržiūrėti Mentorius</a></li>
                <li><a href="{{ route('mentors.create') }}">Sukurti Mentorių</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Studentai <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('students.index') }}">Peržiūrėti Studentus</a></li>
                <li><a href="{{ route('students.create') }}">Sukurti Studentą</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Administratoriai <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('users.index') }}">Peržiūrėti Administratorius</a></li>
                <li><a href="{{ route('users.create') }}">Sukurti Administratorių</a></li>
            </ul>
        </li>
        <li><a href="{{ route('users.changePassword') }}">Slaptažodžio Keitimas</a></li>
        <li><a href="{{ route('login.disconnect') }}">Atsijungti</a></li>
    @endif
           </ul>
        </div>
    </div>
</nav>