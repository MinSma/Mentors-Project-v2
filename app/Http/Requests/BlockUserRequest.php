<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockUserRequest extends FormRequest
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
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required|max:255'
        ];
    }

    /**
     * @return date
     */
    public function getStartDate()
    {
        return $this->input('start_date');
    }

    /**
     * @return date
     */
    public function getEndDate()
    {
        return $this->input('end_date');
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->input('reason');
    }
}
