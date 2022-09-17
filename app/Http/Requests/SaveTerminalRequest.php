<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SaveTerminalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guard('project')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'login' => [
                'required', 'alpha_dash', 'min:6','max:20',
                Rule::unique('users', 'login'),Rule::unique('users', 'email'),
                Rule::unique('projects', 'login'),Rule::unique('projects', 'email'),
                Rule::unique('terminals', 'login'),Rule::unique('terminals', 'email'),
            ],
            'password' => [
                $this->isEditing() ? 'nullable' : 'required', 'confirmed',
                Password::min(6)->letters()->numbers()->mixedCase()
            ],
            'pincode' => ['nullable', 'numeric', 'digits:6'],
        ];
    }

    private function isEditing(): bool
    {
        return is_numeric($this->route()->parameter('id'));
    }
}
