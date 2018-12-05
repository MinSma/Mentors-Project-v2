<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Reservation;
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

    /**
     * ReservationsController constructor.
     * @param ReservationsRepository $reservationsRepository
     */
    public function __construct(ReservationsRepository $reservationsRepository)
    {
        $this->reservationsRepository = $reservationsRepository;
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
    
    public function confirm()
    {
    
    }

    /**
     * @param Mentor $mentor
     * @return $this
     */
    public function store(Mentor $mentor) {
        $id = Auth::guard('student')->user()['id'];

        if($id != null){
            $doesHaveReservation = $this->reservationsRepository->model()
                ::where('mentor_id', $mentor['id'])
                ->where('student_id', $id)
                ->first();

            if($doesHaveReservation == NULL) {
                $data = [
                    'mentor_id' => $mentor['id'],
                    'application_date' => date('Y-m-d H:i:s'),
                    'status' => 'pending',
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
