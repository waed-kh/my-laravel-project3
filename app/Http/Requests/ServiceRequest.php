<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
              'name.required' => 'يرجى إدخال اسم   الخدمة',
    'name.string' => 'اسم  الخدمة يجب أن يكون نصًا',
    'name.regex' => 'اسم   الخدمة يجب أن يحتوي على أحرف وليس أرقام فقط' 

        ];
    }
}
