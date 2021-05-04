<?php

namespace App\Http\Requests\Api\Card;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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

        $rules = [
            'user_id' => ['required'],
            'title' => ['required'],
            'description' => [],
            'color' => [],
        ];

        if ($this->isMethod('post')) {
            $rules['name'] = 'required';
            $rules['description'] = ['required'];
            $rules['color'] = ['required'];
        }

        return $rules;
    }
}
