<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
        'user_id' => ['required', 'exists:users,id'],
        'rate'    => ['required', 'integer', 'min:1', 'max:5'],
        'content' => ['required', 'string', 'min:10', 'max:1000'],
    ];
}






public function messages(): array
{
    return [
        'user_id.required' => 'يرجى اختيار المستخدم المرتبط بالتقييم.',
        'user_id.exists'   => 'المستخدم المحدد غير موجود في قاعدة البيانات.',

        'rate.required' => 'يرجى إدخال التقييم.',
        'rate.integer'  => 'قيمة التقييم يجب أن تكون رقمًا صحيحًا.',
        'rate.min'      => 'أقل تقييم مسموح به هو 1.',
        'rate.max'      => 'أعلى تقييم مسموح به هو 5.',

        'content.required' => 'يرجى إدخال محتوى التقييم.',
        'content.string'   => 'محتوى التقييم يجب أن يكون نصًا.',
        'content.min'      => 'محتوى التقييم يجب أن يكون على الأقل 10 أحرف.',
        'content.max'      => 'محتوى التقييم لا يمكن أن يتجاوز 1000 حرف.',
    ];
}


}
