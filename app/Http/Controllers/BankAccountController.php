<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BankAccountController extends Controller
{
    /**
     * @return View
     */
    public function showPaymentForm() : View
    {
        return view('payments.paymentForm');
    }
}
