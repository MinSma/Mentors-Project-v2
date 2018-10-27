
<h1 class="mb-2 text-center">Susisiekite Su Mumis</h1>

    @if(session('message'))
        <div class='alert alert-success'>
            {{ session('message') }}
        </div>
    @endif

    <br />
<div class="container lower">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Susisiekite</p>
                </div>
                <div class="panel-body">
                    <form action="/contactus" method="post">
                        {{ csrf_field() }}
                             <div class="form-group">
                    <label for="Name">Vardas: </label>
                    <input type="text" class="form-control" id="name" placeholder="Jūsų vardas" name="name" required>
                </div>

                                       <div class="form-group">
                    <label for="email">Elektroninis pašto adresas: </label>
                    <input type="text" class="form-control" id="email" placeholder="john@example.com" name="email" required>
                </div>

                       <div class="form-group">
                    <label for="message">Žinutė: </label>
                    <textarea type="text" class="form-control luna-message" id="message" placeholder="Įveskite savo žinutę čia"
                              name="message" required></textarea>
                </div>

                        <div class="form-group">
                    <button type="submit" class="btn btn-small btn-info orange-bg" value="Send">Siųsti</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

