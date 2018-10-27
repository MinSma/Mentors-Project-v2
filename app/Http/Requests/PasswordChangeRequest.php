<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current-password'  => 'required|min:6|max:255',
            'password'          => 'required|min:6|max:255|confirmed'
        ];
    }

    /**
     * @return array|string
     */
    public function getCurrentPassword() {
        return $this->input('current-password');
    }

    /**
     * @return array|null|string
     */
    public function getPassword()
    {
        return $this->input('password');
    }
}
