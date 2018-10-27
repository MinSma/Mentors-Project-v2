<?php
declare(strict_types = 1);

namespace App\Services;

use App\Http\Requests\LoginRequest;

/**
 * Class LoginService
 * @package App\Services
 */
class LoginService
{
    /**
     * @param LoginRequest $request
     * @param string $auth
     * @return bool
     */
    private function getLoginData(LoginRequest $request, $auth = '')
    {
        if(auth($auth)->attempt([
            'email'    => $request->getEmail(),
            'password' => $request->getPassword()],
            $request->getRemember()))
            return true;
        return false;
    }

    /**
     * @param LoginRequest $request
     * @return bool
     */
    public function tryMentor(LoginRequest $request)
    {
        if($this->getLoginData($request, 'mentor'))
            return true;
        return false;
    }

    /**
     * @param LoginRequest $request
     * @return bool
     */
    public function tryStudent(LoginRequest $request)
    {
        if($this->getLoginData($request, 'student'))
            return true;
        return false;
    }

    /**
     * @param LoginRequest $request
     * @return bool
     */
    public function tryUser(LoginRequest $request)
    {
        if($this->getLoginData($request, 'web'))
            return true;
        return false;

    }
}