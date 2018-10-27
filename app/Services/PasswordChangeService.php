<?php
declare(strict_types = 1);

namespace App\Services;

use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class PasswordChangeService
 * @package App\Services
 */
class PasswordChangeService
{
    /**
     * @param PasswordChangeRequest $request
     */
    public function changePassword(PasswordChangeRequest $request)
    {
        $user = Auth::user();

        if(Hash::check($request->getCurrentPassword(), $user->getAuthPassword()))
        {
            $user->password = bcrypt($request->getPassword());
            $user->save();

            return true;
        }

        return false;
    }
}