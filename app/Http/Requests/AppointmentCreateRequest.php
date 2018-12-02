<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
        
        ];
    }
    
    public function getDate()
    {
        return $this->input('date');
    }
    
    public function getTime()
    {
        return $this->input('time');
    }
    
    public function getDuration()
    {
        return $this->input('duration');
    }
    
    public function getPrice()
    {
        return $this->input('price');
    }
    
    public function getType()
    {
        return $this->input('type');
    }
    
    public function getResources()
    {
        return $this->input('resources');
    }
    
    public function getPlace()
    {
        return $this->input('place');
    }
    
    public function getAdditionalCost()
    {
        return $this->input('additional_cost');
    }
    
    public function getMaxDistances()
    {
        return $this->input('max_distances');
    }
    
    public function getLanguage()
    {
        return $this->input('language');
    }
    
    public function getAdditionalInfo()
    {
        return $this->input('additional_info');
    }
    
    public function getLessonId()
    {
        return $this->input('lesson_id');
    }
}
