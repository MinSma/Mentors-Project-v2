<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonCreateRequest extends FormRequest
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
            'level' => 'required|max:255',
            'subject' => 'required|max:255',
            'description' => 'required|max:255',
            'qualification' => 'required|max:255',
        ];
    }

    public function getLevel()
    {
        return $this->input('level');
    }
    
    public function getSubject()
    {
        return $this->input('subject');
    }
    
    public function getDescription()
    {
        return $this->input('description');
    }
    
    public function getQualification()
    {
        return $this->input('qualification');
    }
}
