<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Repositories\AppointmentsRepository;

class AppointmentsController extends Controller
{
    public $appointmentsRepository;
    
    public function __construct(AppointmentsRepository $appointmentsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
    }
    
    public function show(Lesson $lesson)
    {
        $id = Auth::guard('mentor')->user()['id'];
    
        $appointments = $this->appointmentsRepository->model()::where('mentor_id', $id)->where('lesson_id', $lesson['id'])->get();
        
        return view('appointments.dashboard', ['appointments' => $appointments]);
    }
    
    public function create()
    {
        return view('appointments.create');
    }
    
    public function store(LessonCreateRequest $request)
    {
        $id = Auth::guard('mentor')->user()['id'];
        
        if($id != null) {
            $data = [
                'mentor_id'     => $id,
                'level'         => $request->getLevel(),
                'subject'       => $request->getSubject(),
                'description'   => $request->getDescription(),
                'qualification' => $request->getQualification(),
            ];
            
            $this->lessonsRepository->create($data);
            
            return redirect('/login')->withSuccess('Pamoka buvo sėkmingai sukurta');
        }
        return redirect()->back()->withErrors('Nepavyko, jūs nesate mentorius');
    }
    
    public function destroy(Lesson $lesson)
    {
        
        $lesson->delete();
        
        return redirect()->back()->withSuccess('Pamoka buvo sėkmingai pašalintas');
    }
}
