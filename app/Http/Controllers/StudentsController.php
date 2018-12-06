<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\BlockUserRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Repositories\BankAccountsRepository;
use App\Repositories\BlockingRepository;
use App\Repositories\CommentsRepository;
use App\Repositories\MentorsRepository;
use App\Repositories\RatingsRepository;
use App\Repositories\ReservationsRepository;
use App\Services\PasswordChangeService;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Repositories\StudentsRepository;
use App\Models\Student;
use App\Models\Mentor;
use http\Env\Request;
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
     * @var BlockingsRepository
     */
    private $blockingsRepository;

    /**
     * @var BankAccountsRepository
     */
    private $bankAccountsRepository;

    /**
     * @var RatingsRepository
     */
    private $ratingsRepository;

    /**
     * StudentsController constructor.
     * @param StudentsRepository $studentsRepository
     * @param PasswordChangeService $passwordChangeService
     * @param ReservationsRepository $reservationsRepository
     * @param MentorsRepository $mentorsRepository
     * @param CommentsRepository $commentsRepository
     * @param BlockingRepository $blockingsRepository
     * @param BankAccountsRepository $bankAccountsRepository
     * @param RatingsRepository $ratingsRepository
     */
    public function __construct(StudentsRepository $studentsRepository, PasswordChangeService $passwordChangeService,
                                ReservationsRepository $reservationsRepository, MentorsRepository $mentorsRepository,
                                CommentsRepository $commentsRepository, BlockingRepository $blockingsRepository,
                                BankAccountsRepository $bankAccountsRepository, RatingsRepository $ratingsRepository)
    {
        $this->studentsRepository = $studentsRepository;
        $this->passwordChangeService = $passwordChangeService;
        $this->reservationsRepository = $reservationsRepository;
        $this->mentorsRepository = $mentorsRepository;
        $this->commentsRepository = $commentsRepository;
        $this->blockingsRepository = $blockingsRepository;
        $this->bankAccountsRepository = $bankAccountsRepository;
        $this->ratingsRepository = $ratingsRepository;
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
        $id = Auth::guard('student')->user()['bank_accounts_id'];

        $bankAccount = $this->bankAccountsRepository->model()::find($id);

        return view('students.dashboard', ['bankAccount' => $bankAccount]);
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
        $created = $this->bankAccountsRepository->create([
            'amount' => 0.0
        ]);

        $data = [
            'password' => bcrypt($request->getPassword()),
            'email' => $request->getEmail(),
            'first_name' => $request->getFirstName(),
            'last_name' => $request->getLastName(),
            'gender' => $request->getGender(),
            'city' => $request->getCity(),
            'address' => $request->getAddress(),
            'birthday' => $request->getBirthday(),
            'education' => $request->getEducation(),
            'phone' => $request->getPhone(),
            'bank_accounts_id' => $created['id']
        ];

        $this->studentsRepository->create($data);

        return redirect('/login')->with('status', 'Studentas buvo sėkmingai sukurtas');
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
     * @param Student $student
     * @return View
     */
    public function block(Student $student): View
    {
        return view('students.block', [
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
            'city' => $request->getCity(),
            'address' => $request->getAddress(),
            'birthday' => $request->getBirthday(),
            'education' => $request->getEducation(),
            'phone' => $request->getPhone(),
        ]);

        return redirect()->route('students.index')
            ->with('status', 'Studento duomenys buvo sėkmingai atnaujinti');
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

        $ratings = $this->ratingsRepository->model()
            ::where('student_id', $student['id'])->get();

        foreach ($ratings as $key) {
            $key->delete();
        }

        $bankAccount = $this->bankAccountsRepository->model()
            ::where('student_id', $student['id'])->get();

        foreach ($bankAccount as $key) {
            $key->delete();
        }

        $student->delete();

        return redirect()->back()
            ->with('status', 'Studentas buvo sėkmingai pašalintas');
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
            ->with('status', 'Slaptažodis buvo sėkmingai pakeistas');
        else
            return redirect()->back()->withErrors(['passwordChange' => 'Slaptažodis nebuvo pakeistas, įvestas blogas dabartinis slaptažodis']);
    }

    /**
     * @param BlockUserRequest $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function blockStore(BlockUserRequest $request, Student $student)
    {
        $data = [
            'start_date' => $request->getStartDate(),
            'end_date' => $request->getEndDate(),
            'reason' => $request->getReason()
        ];

        if($student['blockings_id'] == NULL)
        {
            $created = $this->blockingsRepository->create($data);

            $student->update([
                'blockings_id' => $created['id']
            ]);
        }
        else
        {
            $blocking = $this->blockingsRepository->model()::find($student['blockings_id']);
            $blocking->update($data);
        }

        return redirect()->back()
            ->with('status', 'Studentas buvo sėkmingai užblokuotas');
    }
}
