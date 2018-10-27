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
        $lessons = $this->lessonsRepository->model()::paginate(10);
    
        return view('lessons.dashboard', ['lessons' => $lessons]);
    }
    
    public function create()
    {
        return view('lessons.create');
    }
    
    public function store(LessonCreateRequest $request)
    {
        $id = Auth::guard('mentor')->user()['id'];
    
        $data = [
            'level' => $request->getLevel(),
            'subject' => $request->getSubject(),
            'description' => $request->getDescription(),
            'qualification' => $request->getQualification(),
            'mentor_id' => $id,
        ];
        
        $this->lessonsRepository->create($data);
        
        return redirect('/login')->withSuccess('Pamoka buvo sėkmingai sukurta');
    }
    
    public function destroy(Lesson $lesson)
    {
        
        $lesson->delete();
        
        return redirect()->back()->withSuccess('Pamoka buvo sėkmingai pašalintas');
    }
}
