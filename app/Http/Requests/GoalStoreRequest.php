<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoalStoreRequest extends Request
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
            'text' => 'required|unique:goals|string|max:50',
            'curator_email' => 'required|email',
            'check_at' => 'required|date|after:tomorrow'
        ];
    }
}
