<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخوّلًا لتنفيذ الطلب.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * قواعد التحقق من صحة البيانات.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', 'max:255', 'regex:/^[\p{Arabic}a-zA-Z\s\-،.]+$/u'],
            'category_id' => ['bail', 'required', 'integer'],
            'description' => ['bail', 'required', 'string', 'regex:/^[\p{Arabic}a-zA-Z\s\-،.]+$/u'],
            'min_price' => ['bail', 'required', 'numeric', 'min:0'],
            'max_price' => ['bail', 'required', 'numeric', 'min:0'],
            'phone' => ['bail', 'required', 'string', 'regex:/^[0-9+\-\s]+$/'],
            'email' => ['bail', 'required', 'email'],
            'location' => ['bail', 'required', 'string', 'regex:/^[\p{Arabic}a-zA-Z0-9\s\-،.]+$/u'],

            'services' => ['required', 'array'],
            'services.*' => ['bail', 'integer'],

            'workday' => ['nullable', 'array'],
            'workday.*' => ['bail', 'integer'],
        ];
    }

    /**
     * رسائل الأخطاء المخصصة.
     */
    public function messages(): array
    {
        return [
            // العنوان
            'title.required' => 'يرجى إدخال عنوان المشروع.',
            'title.string' => 'عنوان المشروع يجب أن يكون نصًا.',
            'title.max' => 'عنوان المشروع يجب ألا يزيد عن 255 حرفًا.',
            'title.regex' => 'عنوان المشروع يجب أن يحتوي فقط على حروف عربية أو إنجليزية  ومسافات.',

            // التصنيف
            'category_id.required' => 'يرجى اختيار تصنيف المشروع.',
            'category_id.integer' => 'تصنيف المشروع يجب أن يكون رقمًا صحيحًا.',

            // الوصف
            'description.required' => 'يرجى إدخال وصف المشروع.',
            'description.string' => 'وصف المشروع يجب أن يكون نصًا.',
            'description.regex' => 'الوصف يجب أن يحتوي على حروف وكلمات مفهومة فقط.',

            // السعر الأدنى
            'min_price.required' => 'يرجى إدخال الحد الأدنى للسعر.',
            'min_price.numeric' => 'الحد الأدنى يجب أن يكون رقمًا.',
            'min_price.min' => 'يجب ألا يكون الحد الأدنى أقل من 0.',

            // السعر الأقصى
            'max_price.required' => 'يرجى إدخال الحد الأقصى للسعر.',
            'max_price.numeric' => 'الحد الأقصى يجب أن يكون رقمًا.',
            'max_price.min' => 'يجب ألا يكون الحد الأقصى أقل من 0.',

            // الهاتف
            'phone.required' => 'يرجى إدخال رقم الهاتف.',
            'phone.string' => 'رقم الهاتف يجب أن يكون نصًا.',
            'phone.regex' => 'رقم الهاتف يجب أن يحتوي فقط على أرقام، ومسافات، وعلامة + أو -.',

            // البريد الإلكتروني
            'email.required' => 'يرجى إدخال البريد الإلكتروني.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',

            // الموقع
            'location.required' => 'يرجى تحديد الموقع.',
            'location.string' => 'الموقع يجب أن يكون نصًا.',
            'location.regex' => 'الموقع يجب أن يحتوي على أحرف أو أرقام فقط، بدون رموز غير مفهومة.',

            // الخدمات
            'services.required' => 'يرجى اختيار الخدمات المرتبطة بالمشروع.',
            'services.array' => 'الخدمات يجب أن تكون على شكل قائمة.',
            'services.*.integer' => 'كل خدمة يجب أن تكون رقمًا صحيحًا.',

            // أيام العمل
            'workday.array' => 'أيام العمل يجب أن تكون على شكل قائمة.',
            'workday.*.integer' => 'كل يوم عمل يجب أن يكون رقمًا صحيحًا.',
        ];
    }
}
