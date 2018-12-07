<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Reservation;
use App\Repositories\LessonsRepository;
use App\Repositories\MentorsRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\ReservationsRepository;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class ReservationsController
 * @package App\Http\Controllers
 */
class ReservationsController extends Controller
{
    /**
     * @var ReservationsRepository
     */
    private $reservationsRepository;
    private $lessonsRepository;
    private $mentorsRepository;
    private $ordersRepository;
    
    /**
     * ReservationsController constructor.
     * @param ReservationsRepository $reservationsRepository
     * @param LessonsRepository      $lessonsRepository
     * @param MentorsRepository      $mentorsRepository
     * @param OrdersRepository       $ordersRepository
     */
    public function __construct(ReservationsRepository $reservationsRepository, LessonsRepository $lessonsRepository, MentorsRepository $mentorsRepository, OrdersRepository $ordersRepository )
    {
        $this->reservationsRepository = $reservationsRepository;
        $this->lessonsRepository = $lessonsRepository;
        $this->mentorsRepository = $mentorsRepository;
        $this->ordersRepository = $ordersRepository;
    }

    /**
     * @return View
     */
    public function show() : View
    {
        if(Auth::guard('student')->check())
        {
            $id = Auth::guard('student')->user()['id'];
            $reservations = $this->reservationsRepository->all()->where('student_id', $id);
            
        }
        else
        {
            $id = Auth::guard('mentor')->user()['id'];
            $reservations = $this->reservationsRepository->all()->where('mentor_id', $id);
    
        }
    
        return view('reservations.dashboard', ['reservations' => $reservations]);
    }

    /**
     * @return View
     */
    public function showForStudents() : View
    {
        return view('reservations.showForStudents');
    }
    
    public function confirm(Reservation $reservation)
    {
        $reservation->update([
            'status' => 'Patvirtinta',
            'confirmation_date' => date('Y-m-d H:i:s'),
        ]);
        
        $data = [
            'state' => 'Neapmoketas',
            'creation_date' => date('Y-m-d H:i:s'),
            'mentor_confirmation' => false,
            'student_confirmation' => false,
            'reservation_id' => $reservation->id
        ];
        
        $this->ordersRepository->create($data);
        
        return redirect()->back()->with('status', 'Sėkmingai patvirtinote rezervacija');
    
    }

    /**
     * @param Mentor $mentor
     * @return $this
     */
    public function store(Appointment $appointment) {
        $id = Auth::guard('student')->user()['id'];
        $lesson = $this->lessonsRepository->model()::where('id', $appointment['lesson_id'])->first();
        $mentor = $this->mentorsRepository->model()::where('id', $lesson['mentor_id'])->first();
        if($id != null){
            $doesHaveReservation = $this->reservationsRepository->model()
                ::where('mentor_id', $mentor['id'])
                ->where('student_id', $id)
                ->first();

            if($doesHaveReservation == NULL) {
                $data = [
                    'mentor_id' => $mentor['id'],
                    'application_date' => date('Y-m-d H:i:s'),
                    'status' => 'Laukia mentoriaus patvirtinimo',
                    'student_id' => $id
                ];

                $this->reservationsRepository->create($data);
            } else {
                return redirect()->back()->with('status', 'Nepavyko užsiregistruoti į mentoriaus užsiėmimus, Jūs jau esate užsiregistravę pas šį mentorių');
            }

            return redirect()->back()->with('status', 'Sėkmingai užsiregistravote į mentoriaus užsiėmimus');
        }

        return redirect()->back()->with('status', 'Nepavyko užsiregistruoti į mentoriaus užsiėmimus, Jūs nesate studentas');
    }

    /**
     * @param Mentor $mentor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unstore(Mentor $mentor)
    {
        $id = Auth::guard('student')->user()['id'];

        $doesHaveReservation = $this->reservationsRepository->model()
            ::where('mentor_id', $mentor['id'])
            ->where('student_id', $id)
            ->first();

        if($id != null && $doesHaveReservation != NULL){
            $doesHaveReservation->delete();

            return redirect()->back()->with('status', 'Sėkmingai išsiregistravote iš mentoriaus užsiėmimų');
        }

        return redirect()->back()->with('status', 'Nepavyko išsiregistruoti iš mentoriaus užsiėmimų, jūs nebuvote prisiregistravęs');
    }
    
    
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        
        return redirect()->back()->with('status', 'Rezervacija buvo sėkmingai pašalintas');
    }
}
