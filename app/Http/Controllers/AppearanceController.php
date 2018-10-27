<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AppearanceController extends Controller
{
    public function home(): View
    {
        return view('guestPages.homePage.home');
    }
}
