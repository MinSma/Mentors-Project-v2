<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UsersRepository;
use App\Services\PasswordChangeService;
use App\User;
use Illuminate\View\View;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * @var PasswordChangeService
     */
    private $passwordChangeService;

    /**
     * UsersController constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository, PasswordChangeService $passwordChangeService)
    {
        $this->usersRepository = $usersRepository;
        $this->passwordChangeService = $passwordChangeService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $users = $this->usersRepository->model()::paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function dashboard(): View
    {
        return view('users.dashboard');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * @param UserUpdateRequest $request
     * @return mixed
     */
    public function store(UserUpdateRequest $request)
    {
        $data = [
            'email' => $request->getEmail(),
            'password' => bcrypt($request->getPassword()),
            'name' => $request->getName(),
        ];

        $this->usersRepository->create($data);

        return redirect()->back()
            ->withSuccess('Administratorius buvo sėkmingai sukurtas');
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return mixed
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'email' => $request->getEmail(),
            'name' => $request->getName()]);

        return redirect()->route('users.index')
            ->withSuccess('Administratoriaus duomenys buvo sėkmingai atnaujinti');
    }

    /**
     * @param User $user
     * @return mixed
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()
            ->withSuccess('Administratorius buvo sėkmingai pašalintas');
    }

    /**
     * @return View
     */
    public function changePassword() : View
    {
        return view('users.changePassword');
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
