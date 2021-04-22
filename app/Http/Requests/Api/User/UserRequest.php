<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserRequest extends FormRequest
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
            'name' => ['filled'],
            'email' => [],
            'password' => [],
            'avatar' => [],
            'phone' => ['nullable', 'regex:/^\d{2}\s\d{8,9}$/'],
            'gender' => [Rule::in(['M', 'F'])],
        ];

        if ($this->isMethod('post')) {
            $rules['name'][] = 'required';
            $rules['email'] = ['required', 'email', 'unique:users,email'];
            $rules['password'] = ['nullable', 'min:6'];
        }

        return $rules;
    }
}
