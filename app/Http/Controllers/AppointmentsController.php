<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentCreateRequest;
use App\Models\Appointment;
use App\Models\Lesson;
use App\Repositories\AppointmentsRepository;
use App\Repositories\LessonsRepository;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    private $appointmentsRepository;
    private $lessonsRepository;
    
    public function __construct(AppointmentsRepository $appointmentsRepository, LessonsRepository $lessonsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
        $this->lessonsRepository = $lessonsRepository;
    }
    
    public function show()
    {
        //$id = Auth::guard('mentor')->user()['id'];
        
        //$appointments = $this->appointmentsRepository->model()::where('mentor_id', $id)->where('lesson_id', $lesson['id'])->get();
        
        return view('appointments.dashboard'// ['appointments' => $appointments]
        );
    }
    
    public function create(Lesson $lesson)
    {
        return view('appointments.create', ['lesson' => $lesson]);
    }
    
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
    
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        
        return redirect()->back()->with('status', 'Užsiėmimas buvo sėkmingai pašalintas');
    }
}
