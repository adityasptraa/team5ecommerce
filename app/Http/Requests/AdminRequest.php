<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Sesuaikan dengan logic autorisasi Anda
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8',
        ];

        // Jika update, password tidak wajib
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['password'] = 'nullable|min:8';
            $rules['email'] = 'required|email|unique:admins,email,' . $this->admin;
        }

        return $rules;
    }
}
