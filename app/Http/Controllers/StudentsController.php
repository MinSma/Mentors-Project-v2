<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StudentUpdateRequest;
use App\Repositories\CommentsRepository;
use App\Repositories\MentorsRepository;
use App\Repositories\ReservationsRepository;
use App\Services\PasswordChangeService;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Repositories\StudentsRepository;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class StudentsController
 * @package App\Http\Controllers
 */
class StudentsController extends Controller
{
    /**
     * @var StudentsRepository
     */
    private $studentsRepository;

    /**
     * @var PasswordChangeService
     */
    private $passwordChangeService;

    /**
     * @var ReservationsRepository
     */
    private $reservationsRepository;

    /**
     * @var MentorsRepository
     */
    private $mentorsRepository;

    /**
     * @var CommentsRepository
     */
    private $commentsRepository;

    /**
     * StudentsController constructor.
     * @param StudentsRepository $studentsRepository
     * @param PasswordChangeService $passwordChangeService
     * @param ReservationsRepository $reservationsRepository
     * @param MentorsRepository $mentorsRepository
     * @param CommentsRepository $commentsRepository
     */
    public function __construct(StudentsRepository $studentsRepository, PasswordChangeService $passwordChangeService,
                                ReservationsRepository $reservationsRepository, MentorsRepository $mentorsRepository,
                                CommentsRepository $commentsRepository)
    {
        $this->studentsRepository = $studentsRepository;
        $this->passwordChangeService = $passwordChangeService;
        $this->reservationsRepository = $reservationsRepository;
        $this->mentorsRepository = $mentorsRepository;
        $this->commentsRepository = $commentsRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $students = $this->studentsRepository->model()::paginate(10);

        return view('students.index', ['students' => $students]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function dashboard(): View
    {
        return view('students.dashboard');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * @param StudentCreateRequest $request
     * @return View
     */
    public function store(StudentCreateRequest $request)
    {
        $data = [
            'password' => bcrypt($request->getPassword()),
            'email' => $request->getEmail(),
            'first_name' => $request->getFirstName(),
            'last_name' => $request->getLastName(),
            'gender' => $request->getGender(),
            'age' => $request->getAge(),
            'city' => $request->getCity()
        ];

        $this->studentsRepository->create($data);

        return redirect('/login')->withSuccess('Studentas buvo sėkmingai sukurtas');
    }

    /**
     * @param Student $student
     * @return View
     */
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    /**
     * @param Student $student
     * @return View
     */
    public function edit(Student $student): View
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * @param StudentUpdateRequest $request
     * @param Student $student
     * @return mixed
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update([
            'first_name' => $request->getFirstName(),
            'last_name' => $request->getLastName(),
            'gender' => $request->getGender(),
            'age' => $request->getAge(),
            'city' => $request->getCity()
        ]);

        return redirect()->route('students.index')
            ->withSuccess('Studento duomenys buvo sėkmingai atnaujinti');
    }

    /**
     * @param Student $student
     * @return View
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        $reservations = $this->reservationsRepository->model()
            ::where('student_id', $student['id'])->get();

        foreach($reservations as $key){
            $key->delete();
        }

        $comments = $this->commentsRepository->model()
            ::where('student_id', $student['id'])->get();

        foreach($comments as $key){
            $key->delete();
        }

        $student->delete();

        return redirect()->back()
            ->withSuccess('Studentas buvo sėkmingai pašalintas');
    }

    /**
     * @return View
     */
    public function changePassword() : View
    {
        return view('students.changePassword');
    }

    /**
     * @return View
     */
    public function mentors() : View
    {
        $id = Auth::guard('student')->user()['id'];

        $reservations = $this->reservationsRepository->model()
            ::where('student_id', $id)->get();

        $mentors = array();

        foreach($reservations as $key){
            array_push($mentors, $this->mentorsRepository->model()::find($key['mentor_id']));
        }

        return view('students.mentors', compact('mentors'));
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
