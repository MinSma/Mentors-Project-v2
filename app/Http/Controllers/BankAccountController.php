<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BankAccountController extends Controller
{
    public function showPaymentForm()
    {
        return view('payments.paymentForm');
    }
}
