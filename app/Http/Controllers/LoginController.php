<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
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
     * LoginController constructor.
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
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
            return redirect()->route('students.dashboard')->withSuccess('Sėkmingai prisijungėte');

        else if ($this->loginService->tryMentor($request))
            return redirect()->route('mentors.dashboard')->withSuccess('Sėkmingai prisijungėte');

        else if ($this->loginService->tryUser($request))
            return redirect()->route('users.dashboard')->withSuccess('Sėkmingai prisijungėte');

        else return redirect()->back()->withErrors('Prisijungimas nepavyko, įvesti blogi prisijungimo duomenys');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disconnect()
    {
        auth('mentor')->logout();
        auth('student')->logout();
        auth('web')->logout();

        return view('login.index')->withSuccess('Sėkmingai atsijungėte');
    }
}