<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {

        return [
               'name' => ['required', 'string', 'max:255', 'regex:/[a-zA-Zأ-ي]/'],

        ];
    }


   public function messages(): array
    {

        return [
              'name.required' => 'يرجى إدخال اسم  الموقع',
    'name.string' => 'اسم الموقع يجب أن يكون نصًا',
    'name.regex' => 'اسم  الموقع يجب أن يحتوي على أحرف وليس أرقام فقط' 

        ];
    }
}

