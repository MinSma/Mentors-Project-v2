<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
//            'email'                 => 'required|email',
//            'password'              => 'required',
//            'password_confirmation' => 'confirmed',
//            'name'                  => 'required',

        ];
    }

    /**
     * @return array|string
     */
    public function getName()
    {
        return $this->input('name');
    }

    /**
     * @return array|null|string
     */
    public function getPassword()
    {
        return $this->input('password');
    }


    /**
     * @return array|string
     */
    public function getEmail()
    {
        return $this->input('email');
    }



}
