<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkDayRequest extends FormRequest
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
        'day'        => ['required', 'string'],
        'time_slot'  => ['required', 'string', 'max:50'],
        'from_time'  => ['required', 'date_format:H:i'],
        'to_time'    => ['required', 'date_format:H:i', 'after:from_time'],
    ];
}
public function messages(): array
{
    return [
        'day.required'      => 'يرجى تحديد اليوم.',
        'day.string'        => 'يجب أن يكون اليوم نصًا صحيحًا.',
       
        'time_slot.required' => 'يرجى تحديد فترة التوقيت.',
        'time_slot.string'   => 'يجب أن تكون الفترة نصية.',
        'time_slot.max'      => 'عدد الأحرف في الفترة لا يجب أن يتجاوز 50 حرفًا.',

        'from_time.required'      => 'يرجى إدخال وقت البداية.',
        'from_time.date_format'   => 'تنسيق وقت البداية غير صالح، يجب أن يكون بصيغة HH:MM (مثلاً 08:00).',

        'to_time.required'        => 'يرجى إدخال وقت النهاية.',
        'to_time.date_format'     => 'تنسيق وقت النهاية غير صالح، يجب أن يكون بصيغة HH:MM.',
        'to_time.after'           => 'وقت النهاية يجب أن يكون بعد وقت البداية.',
    ];
}

}
