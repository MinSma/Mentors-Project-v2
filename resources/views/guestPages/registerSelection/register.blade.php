<!DOCTYPE html>
<html lang="en">
    <head>
        @section('title', 'Pasirinkite Registraciją')
        @include('guestPagesLayouts.homeHeaderIncludes')
    </head>

    <body id="Mentors_Project" data-spy="scroll" data-target=".navbar" data-offset="60">
        @include('guestPagesLayouts.homeNavigation')
        @include('guestPagesLayouts.homeHeaderSection')
        @include('guestPagesLayouts.registerSelectionSection')
    </body>
</html>