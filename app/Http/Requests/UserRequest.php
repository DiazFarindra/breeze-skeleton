<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'string'],
            'password' => [Rule::when($this->isMethod('patch') && $this->isNotFilled('password'), 'nullable', 'required'), 'confirmed', Password::default()],

            'roles' => ['required', 'array'],
            'roles.*' => ['string']
        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('patch') && $this->isNotFilled('password')) {
            $this->request->remove('password');
        }
    }
}
