<?php

namespace App\Http\Controllers;

use App\Repositories\BankAccountsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BankAccountController extends Controller
{
    private $bankAccountsRepository;
    
    public function __construct(BankAccountsRepository $bankAccountsRepository)
    {
        $this->bankAccountsRepository = $bankAccountsRepository;
    }
    
    /**
     * @return View
     */
    public function showPaymentForm() : View
    {
        return view('payments.paymentForm');
    }
    
    public function ask(Request $request)
    {
        $student = Auth::guard('student')->user();
        $bankAccount = $this->bankAccountsRepository->model()::where('id', $student['bank_accounts_id']);
        $bankAccount->update([
            'askings' => $request->sum
        ]);
        
        return redirect()->back()->with('status', 'Prasymas papildyti saskaita issiustas');
    
    }
}
