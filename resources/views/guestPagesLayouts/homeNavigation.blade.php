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
                <li><a href="/">Pagrindinis</a></li>
                <li><a href="/contactus">Susisiekite</a></li>
                <li><a href="/registerSelection">Registruotis</a></li>
                <li><a href="/login">Prisijungti</a></li>
            </ul>
        </div>
    </div>
</nav>