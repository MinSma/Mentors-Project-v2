<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'first_name'            => 'required|max:255|regex:/[a-zA-Z]+/',
            'last_name'             => 'required|max:255|regex:/[a-zA-Z]+/',
            'gender'                => 'required',
            'city'                  => 'required|max:255|regex:/[a-zA-Z]+/',
            'address'               => 'required',
            'birthday'              => 'required',
            'education'             => 'required',
            'phone'                 => 'required',
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
     * @return array|string
     */
    public function getLastName()
    {
        return $this->input('last_name');
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
    public function getCity()
    {
        return $this->input('city');
    }
    
    /**
     * @return array|string
     */
    public function getAddress()
    {
        return $this->input('address');
    }
    
    /**
     * @return array|string
     */
    public function getBirthday()
    {
        return $this->input('birthday');
    }
    /**
     * @return array|string
     */
    public function getEducation()
    {
        return $this->input('education');
    }
    /**
     * @return array|string
     */
    public function getPhone()
    {
        return $this->input('phone');
    }
}
