<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LessonCreateRequest;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Repositories\LessonsRepository;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    public $lessonsRepository;
    
    public function __construct(LessonsRepository $lessonsRepository)
    {
        $this->lessonsRepository = $lessonsRepository;
    }
    
    public function showLessons()
    {
        $id = Auth::guard('mentor')->user()['id'];
    
        $lessons = $this->lessonsRepository->model()::where('mentor_id', $id)->get();
    
        return view('lessons.dashboard', ['lessons' => $lessons]);
    }
    
    public function showForStudents(Mentor $mentor)
    {
        $lessons = $this->lessonsRepository->model()::where('mentor_id', $mentor['id'])->get();
    
        return view('lessons.showForStudents', ['lessons' => $lessons]);
    }
    
    public function create()
    {
        return view('lessons.create');
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
