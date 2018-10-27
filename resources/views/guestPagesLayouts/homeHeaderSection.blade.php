<div class="jumbotron text-center">
    <div class="container-fluid">
        <img style="max-width:40%; margin-top: -100px; opacity: 1" src="{{ asset('images/logo_black.png') }}">
        <p>Mokytis daug lengviau, kai šalia patikimas mokytojas!</p>

    <form action="/mentors/found" method="GET" role="search">
        <div class="form-group">
            <label for="topic">Pasirinkti temą</label>

            <select name="topic" id="topic" class="form-control">
                <option value="all">Visus</option>
                <option value="Matematika">Matematika</option>
                <option value="Anglu kalba">Anglų Kalba</option>
                <option value="Informacines Technologijos">Informacinės Technologijos</option>
                <option value="Chemija">Chemija</option>
                <option value="Fizika">Fizika</option>
                <option value="Biologija">Biologija</option>
                <option value="Geografija">Geografija</option>
                <option value="Istorija">Istorija</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-small btn-info orange-bg">Ieškoti</button>
        </div>
    </form>
    </div>
</div>