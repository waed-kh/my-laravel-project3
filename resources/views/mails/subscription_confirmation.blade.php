@component('mail::message')
# شكراً لاشتراكك معنا!

تم تسجيل بريدك الإلكتروني بنجاح:

**{{ $data['email'] }}**

سوف نرسل لك أحدث الأخبار والعروض قريباً.

شكراً,<br>
{{ config('app.name') }}
@endcomponent
