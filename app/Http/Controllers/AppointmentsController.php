<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentCreateRequest;
use App\Models\Appointment;
use App\Models\Lesson;
use App\Repositories\AppointmentsRepository;
use App\Repositories\LessonsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppointmentsController extends Controller
{
    /**
     * @var AppointmentsRepository
     */
    private $appointmentsRepository;

    /**
     * @var LessonsRepository
     */
    private $lessonsRepository;

    /**
     * AppointmentsController constructor.
     * @param AppointmentsRepository $appointmentsRepository
     * @param LessonsRepository $lessonsRepository
     */
    public function __construct(AppointmentsRepository $appointmentsRepository, LessonsRepository $lessonsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
        $this->lessonsRepository = $lessonsRepository;
    }

    /**
     * @return View
     */
    public function show() : View
    {
        $lessons = $this->lessonsRepository->model()::get();

        $appointments = array();

        foreach ($lessons as $lesson)
        {
            $appointmentsArray = $this->appointmentsRepository->model()::where('lesson_id', $lesson['id'])->get();

            foreach ($appointmentsArray as $appointment)
            {
                array_push($appointments, $appointment);
            }
        }

        return view('appointments.dashboard', ['appointments' => $appointments]);
    }

    /**
     * @param Lesson $lesson
     * @return View
     */
    public function create(Lesson $lesson) : View
    {
        return view('appointments.create', ['lesson' => $lesson]);
    }

    /**
     * @param AppointmentCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AppointmentCreateRequest $request)
    {
            $data = [
                'date'              => $request->getDate(),
                'time'              => $request->getTime(),
                'duration'          => $request->getDuration(),
                'price'             => $request->getPrice(),
                'type'              => $request->getType(),
                'resources'         => $request->getResources(),
                'place'             => $request->getPlace(),
                'additional_cost'   => $request->getAdditionalCost(),
                'max_distances'     => $request->getMaxDistances(),
                'language'          => $request->getLanguage(),
                'additional_info'   => $request->getAdditionalInfo(),
                'lesson_id'         => $request->getLessonId(),
                'state'             => 'free'
            ];
            
            $this->appointmentsRepository->create($data);
            
        return redirect()->back()->with('status', 'Užsiėmimas sukurtas');
    }

    /**
     * @param Appointment $appointment
     * @return View
     */
    public function edit(Appointment $appointment) : View
    {
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * @param AppointmentCreateRequest $request
     * @param Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AppointmentCreateRequest $request, Appointment $appointment)
    {
        $appointment->update([
            'date'              => $request->getDate(),
            'time'              => $request->getTime(),
            'duration'          => $request->getDuration(),
            'price'             => $request->getPrice(),
            'type'              => $request->getType(),
            'resources'         => $request->getResources(),
            'place'             => $request->getPlace(),
            'additional_cost'   => $request->getAdditionalCost(),
            'max_distances'     => $request->getMaxDistances(),
            'language'          => $request->getLanguage(),
            'additional_info'   => $request->getAdditionalInfo(),
        ]);

        return redirect()->route('appointments.dashboard')
            ->with('status', 'Užsiėmimo duomenys buvo sėkmingai atnaujinti');
    }

    /**
     * @param Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        
        return redirect()->back()->with('status', 'Užsiėmimas buvo sėkmingai pašalintas');
    }
}
