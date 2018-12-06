<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\BlockingRepository;
use App\Services\LoginService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    private $loginService;

    /**
     * @var BlockingRepository
     */
    private $blockingRepository;

    /**
     * LoginController constructor.
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService, BlockingRepository $blockingRepository)
    {
        $this->loginService = $loginService;
        $this->blockingRepository = $blockingRepository;
    }

    /**
     * @return View
     */
    public function registerSelection() : View
    {
        return view('guestPages.registerSelection.register');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (auth('student')->check())
            return redirect()->route('students.dashboard');

        else if (auth('mentor')->check())
            return redirect()->route('mentors.dashboard');

        else if (auth('web')->check())
            return redirect()->route('users.dashboard');

        return view('login.index');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connect(LoginRequest $request)
    {
        if ($this->loginService->tryStudent($request))
        {
            $isBlocked = Auth::guard('student')->user()['blockings_id'];

            if($isBlocked != NULL)
            {
                $blockingEndDate = $this->blockingRepository->model()
                    ::where('id', $isBlocked)->get()[0]['end_date'];
                $currentTime = Carbon::now();

                if($blockingEndDate > $currentTime)
                {
                    auth('student')->logout();
                    return view('login.index')->withErrors(['login' =>
                        'Jūs esate užblokuotas iki ' . $blockingEndDate]);
                }
            }

            return redirect()->route('students.dashboard')->with('status', 'Sėkmingai prisijungėte');
        }

        else if ($this->loginService->tryMentor($request))
        {
            $isBlocked = Auth::guard('mentor')->user()['blockings_id'];

            if($isBlocked != NULL)
            {
                $blockingEndDate = $this->blockingRepository->model()
                    ::where('id', $isBlocked)->get()[0]['end_date'];
                $currentTime = Carbon::now();

                if($blockingEndDate > $currentTime)
                {
                    auth('mentor')->logout();
                    return view('login.index')->withErrors(['login' =>
                        'Jūs esate užblokuotas iki ' . $blockingEndDate]);
                }
            }

            return redirect()->route('mentors.dashboard')->with('status', 'Sėkmingai prisijungėte');
        }

        else if ($this->loginService->tryUser($request))
        {
            return redirect()->route('users.dashboard')->with('status', 'Sėkmingai prisijungėte');
        }

        else return redirect()->back()->withErrors(['login' => 'Prisijungimas nepavyko, įvesti blogi prisijungimo duomenys']);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disconnect()
    {
        auth('mentor')->logout();
        auth('student')->logout();
        auth('web')->logout();

        return view('login.index')->with('status', 'Sėkmingai atsijungėte');
    }
}