<!DOCTYPE html>
<html lang="en">
    <head>
        @section('title', 'Pagrindinis')
        @include('guestPagesLayouts.homeHeaderIncludes')
    </head>

    <body id="Mentors_Project" data-spy="scroll" data-target=".navbar" data-offset="60">
    	@include('layouts.NavPanel')
        @include('guestPagesLayouts.homeHeaderSection')
        @include('guestPagesLayouts.homeAboutSection')
    </body>
</html>