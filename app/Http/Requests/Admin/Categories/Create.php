<?php

namespace App\Http\Requests\Admin\Categories;

use App\Enums\News\Status;
use Illuminate\Foundation\Http\FormRequest;


class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'slug' =>  ['required', 'string', 'min:2', 'max:100'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'наименование',
            'description' => 'описание',
            'slug' => 'псевдоним',
        ];
    }
}
