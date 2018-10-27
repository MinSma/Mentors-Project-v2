<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\MentorCreateRequest;
use App\Http\Requests\MentorUpdateRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Repositories\CommentsRepository;
use App\Repositories\ReservationsRepository;
use App\Repositories\StudentsRepository;
use App\Services\SearchService;
use App\Services\PasswordChangeService;
use Illuminate\Http\Request;
use App\Repositories\MentorsRepository;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class MentorsController
 * @package App\Http\Controller
 */
class MentorsController extends Controller
{
    /**
     * @var MentorsRepository
     */
    private $mentorsRepository;

    /**
     * @var SearchService
     */
    private $searchService;

    /**
     * @var PasswordChangeService
     */
    private $passwordChangeService;

    /**
     * @var ReservationsRepository
     */
    private $reservationsRepository;

    /**
     * @var StudentsRepository
     */
    private $studentsRepository;

    /**
     * @var CommentsRepository
     */
    private $commentsRepository;

    /**
     * MentorsController constructor.
     * @param MentorsRepository $mentorsRepository
     * @param SearchService $searchService
     * @param PasswordChangeService $passwordChangeService
     * @param ReservationsRepository $reservationsRepository
     * @param StudentsRepository $studentsRepository
     * @param CommentsRepository $commentsRepository
     */
    public function __construct(MentorsRepository $mentorsRepository, SearchService $searchService,
                                PasswordChangeService $passwordChangeService, ReservationsRepository $reservationsRepository,
                                StudentsRepository $studentsRepository, CommentsRepository $commentsRepository)
    {
        $this->mentorsRepository = $mentorsRepository;
        $this->searchService = $searchService;
        $this->passwordChangeService = $passwordChangeService;
        $this->reservationsRepository = $reservationsRepository;
        $this->studentsRepository = $studentsRepository;
        $this->commentsRepository = $commentsRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $mentors = $this->mentorsRepository->model()::paginate(10);

        return view('mentors.index', ['mentors' => $mentors]);
    }

    /**
     * @return View
     */
    public function dashboard(): View
    {
        return view('mentors.dashboard');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('mentors.create');
    }

    /**
     * @param MentorCreateRequest $request
     * @return View
     */
    public function store(MentorCreateRequest $request)
    {
        $data = [
            'email' => $request->getEmail(),
            'password' => bcrypt($request->getPassword()),
            'first_name' => $request->getFirstName(),
            'last_name' => $request->getLastName(),
            'gender' => $request->getGender(),
            'age' => $request->getAge(),
            'city' => $request->getCity(),
            'topic' => $request->getTopic(),
            'fixed_hour_price' => $request->getFixedHourPrice(),
            'rating' => 0.0
        ];

        $this->mentorsRepository->create($data);

        return redirect('/login')->withSuccess('Mentorius buvo sėkmingai sukurtas');
    }

    /**
     * @param Mentor $mentor
     * @return View
     */
    public function show(Mentor $mentor): View
    {
        return view('mentors.show', compact('mentor'));
    }

    /**
     * @param Mentor $mentor
     * @return View
     */
    public function students(): View
    {
        $id = Auth::guard('mentor')->user()['id'];

        $reservations = $this->reservationsRepository->model()
            ::where('mentor_id', $id)->get();

        $students = array();

        foreach($reservations as $key){
            array_push($students, $this->studentsRepository->model()::find($key['student_id']));
        }

        return view('mentors.students', compact('students'));
    }

    /**
     * @param Mentor $mentor
     * @return View
     */
    public function edit(Mentor $mentor): View
    {
        return view('mentors.edit', compact('mentor'));
    }

    /**
     * @param MentorUpdateRequest $request
     * @param Mentor $mentor
     * @return mixed
     */
    public function update(MentorUpdateRequest $request, Mentor $mentor)
    {
        $mentor->update([
            'first_name' => $request->getFirstName(),
            'last_name' => $request->getLastName(),
            'gender' => $request->getGender(),
            'age' => $request->getAge(),
            'city' => $request->getCity(),
            'topic' => $request->getTopic(),
            'fixed_hour_price' => $request->getFixedHourPrice()]);

        return redirect()->route('mentors.index')
            ->withSuccess('Mentoriaus duomenys buvo sėkmingai atnaujinti');
    }

    /**
     * @param Mentor $mentor
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Mentor $mentor)
    {
        $reservations = $this->reservationsRepository->model()
            ::where('mentor_id', $mentor['id'])->get();

        foreach($reservations as $key){
            $key->delete();
        }

        $comments = $this->commentsRepository->model()
            ::where('mentor_id', $mentor['id'])->get();

        foreach($comments as $key){
            $key->delete();
        }

        $mentor->delete();

        return redirect()->back()
            ->withSuccess('Mentorius buvo sėkmingai pašalintas');
    }


    /**
     * @return View
     */
    public function search() : View {
        return view('mentors.search');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function found(Request $request) : View {
        $mentors = $this->searchService->getMentors($request);

        return view('mentors.found', ['mentors' => $mentors]);
    }

    /**
     * @return View
     */
    public function changePassword() : View
    {
        return view('mentors.changePassword');
    }

    /**
     * @param PasswordChangeRequest $request
     * @return mixed
     */
    public function storePassword(PasswordChangeRequest $request)
    {
        $wasChanged = $this->passwordChangeService->changePassword($request);

        if($wasChanged)
            return redirect()->back()
                ->withSuccess('Slaptažodis buvo sėkmingai pakeistas');
        else
            return redirect()->back()->withErrors('Slaptažodis nebuvo pakeistas, įvestas blogas dabartinis slaptažodis');
    }
}
