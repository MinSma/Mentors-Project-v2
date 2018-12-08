<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Repositories\AppointmentsRepository;
use App\Repositories\BankAccountsRepository;
use App\Repositories\InvoicesRepository;
use App\Repositories\LessonsRepository;
use App\Repositories\MentorsRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\StudentsRepository;

class InvoicesController extends Controller
{
    private $ordersRepository;
    private $mentorsRepository;
    private $invoiceRepository;
    private $bankAccountsRepository;
    private $studentsRepository;
    private $appointmentsRepository;
    private $lessonsRepository;
    
    public function __construct(
        OrdersRepository $ordersRepository,
        MentorsRepository $mentorsRepository,
        InvoicesRepository $invoicesRepository,
        BankAccountsRepository $bankAccountsRepository,
        StudentsRepository $studentsRepository,
        AppointmentsRepository $appointmentsRepository,
        LessonsRepository $lessonsRepository
    ) {
        $this->ordersRepository  = $ordersRepository;
        $this->mentorsRepository = $mentorsRepository;
        $this->invoiceRepository = $invoicesRepository;
        $this->bankAccountsRepository = $bankAccountsRepository;
        $this->studentsRepository = $studentsRepository;
        $this->appointmentsRepository = $appointmentsRepository;
        $this->lessonsRepository = $lessonsRepository;
    }
    
    public function pay(Reservation $reservation)
    {
        $student = Auth::guard('student')->user();
        
        $reservation->update([
            'status'            => 'Atlikta',
            'confirmation_date' => date('Y-m-d H:i:s'),
        ]);
        
        $order = $this->ordersRepository->model()::where('reservation_id', $reservation->id)->first();
        
        $order->update([
            'state'        => 'Apmoketas',
            'payment_date' => date('Y-m-d H:i:s'),
        ]);
        
        $lesson =  $this->lessonsRepository->model()::where('id', $reservation['mentor_id'])->first();
        
        $appointment =  $this->appointmentsRepository->model()::where('id', $lesson['lesson_id'])->first();
        
        $bankAccount = $this->bankAccountsRepository->model()::where('id', $student['bank_accounts_id'])->first();
        
        if(($appointment['price'] + $appointment['additional_cost']) < $bankAccount['amount']){
            return redirect()->back()->withErrors( ['payments' => 'Neturite saskaitoje pinigu']);
        }
        else{
            $bankAccount->update([
                'amount' => $bankAccount['amount'] - ($appointment['price'] + $appointment['additional_cost'])
            ]);
        }
        
        $invoiceData = [
            'sum'      => ($appointment['price'] + $appointment['additional_cost']),
            'data'     => date('Y-m-d H:i:s'),
            'comment'  => '',
        ];
        
        $this->invoiceRepository->create($invoiceData);
        
        return redirect()->back()->with('status', 'Sėkmingai sumokejote');
    }
}
