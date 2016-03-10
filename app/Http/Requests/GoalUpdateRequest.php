<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoalUpdateRequest extends Request
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
            'check_token' => 'required|string|max:50|exists:goals,check_token,id,'.$this->id,
            'check' => 'required|boolean'
        ];
    }
}
