<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'email'                 => 'required|max:60|email|unique:students|unique:mentors|unique:users',
            'password'              => 'required|min:6|max:255|confirmed',
            'first_name'            => 'required|max:255|regex:/[a-zA-Z]+/',
            'last_name'             => 'required|max:255|regex:/[a-zA-Z]+/',
            'gender'                => 'required',
            'age'                   => 'required|integer|min:1',
            'city'                  => 'required|max:255|regex:/[a-zA-Z]+/',
        ];
    }

    /**
     * @return array|string
     */
    public function getFirstName()
    {
        return $this->input('first_name');
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
    public function getLastName()
    {
        return $this->input('last_name');
    }

    /**
     * @return array|string
     */
    public function getEmail()
    {
        return $this->input('email');
    }

    /**
     * @return array|string
     */
    public function getGender()
    {
        return $this->input('gender');
    }

    /**
     * @return array|string
     */
    public function getAge()
    {
        return $this->input('age');
    }

    /**
     * @return array|string
     */
    public function getCity()
    {
        return $this->input('city');
    }
}
