<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LessonCreateRequest;
use App\Models\Lesson;
use App\Models\Mentor;
use App\Repositories\LessonsRepository;
use App\Repositories\MentorsRepository;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LessonsController extends Controller
{
    private $lessonsRepository;
    private $mentorsRepository;


    /**
     * @var SearchService
     */
    private $searchService;

    public function __construct(LessonsRepository $lessonsRepository, SearchService $searchService, MentorsRepository $mentorsRepository)
    {
        $this->lessonsRepository = $lessonsRepository;
        $this->mentorsRepository = $mentorsRepository;
        $this->searchService = $searchService;
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
    
            return redirect('/login')->with('status', 'Pamoka buvo sėkmingai sukurta');
        }
        return redirect()->back()->with('status', 'Nepavyko, jūs nesate mentorius');
    }
    
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        
        return redirect()->back()->with('status', 'Pamoka buvo sėkmingai pašalintas');
    }

    /**
     * @return View
     */
    public function search() : View {
        return view('lessons.search');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function found(Request $request) : View {
        $lessons = $this->searchService->getLessons($request);
        $mentors = [];
        foreach($lessons as $lesson)
        {
            array_push($mentors, $this->mentorsRepository->all()->where('id', $lesson->mentor_id));
        }
        
        return view('lessons.found', ['lessons' => $mentors]);
    }
}
