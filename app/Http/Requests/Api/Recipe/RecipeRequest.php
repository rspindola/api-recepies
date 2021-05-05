<?php

namespace App\Http\Requests\Api\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'category_id' => ['required'],
            'name' => ['required'],
            'description' => [],
            'image' => ['image'],
            'preparing' => ['required'],
            'ingredients' => ['required'],
            'cooking_time' => ['required'],
            'portion' => ['required'],
        ];

        if ($this->isMethod('post')) {
            // $rules['name'] = 'required';
        }

        return $rules;
    }
}
