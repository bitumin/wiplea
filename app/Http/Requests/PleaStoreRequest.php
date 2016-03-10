<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PleaStoreRequest extends Request
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
            'text' => 'required|string|max:8000',
            'goal_id' => 'required|exists:goals,id',
            'recipient_id' => 'required|exists:recipients,id'
        ];
    }
}
