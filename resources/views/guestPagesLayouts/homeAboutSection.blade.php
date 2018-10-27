<!-- Container (About Section) -->
<div id="about" class="container">
    <h1 class="mb-2 text-center">Apie svetainę</h1>

    <div class="row">
        <div class="col-md-6 text-center col-md-offset-3 panel-footer">
            <h3>Mentoriams</h3>
            <h4>Padėkite sau būti geriau matomais internete.</h4>
            <h3>Studentams</h3>
            <h4>Raskite tinkamiausią mokytoją ar korepetitorių.</h4>

            <div class="panel-footer">
                <a href="{{ route('mentors.create') }}" class="btn btn-lg">Registruotis Mentoriui</a>
                <a href="{{ route('students.create') }}" class="btn btn-lg">Registruotis Studentui</a>
            </div>
        </div>
    </div>
</div>