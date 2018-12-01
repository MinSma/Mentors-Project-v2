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
//            'first_name'            => 'required|max:255|regex:/[a-zA-Z]+/',
//            'last_name'             => 'required|max:255|regex:/[a-zA-Z]+/',
//            'gender'                => 'required',
//            'city'                  => 'required|max:255|regex:/[a-zA-Z]+/',
//            'address'               => 'required',
//            'birthday'              => 'required',
//            'about'                 => 'required',
//            'phone'                 => 'required',
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
    public function getRole()
    {
        return $this->input('role');
    }
    /**
     * @return array|string
     */
    public function getPhone()
    {
        return $this->input('phone');
    }


}
