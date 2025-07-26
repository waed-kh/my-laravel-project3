<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>تم ارسال الرسالة</title>
</head>

<body>
    <h1>تم ارسال رسالة بنجاح</h1>

    <p><strong>الاسم:</strong> {{ $data['name'] }}</p>
    <p><strong>البريد الإلكتروني:</strong> {{ $data['email'] }}</p>
    <p><strong>الموضوع:</strong> {{ $data['subject'] }}</p>
    <p><strong>الرسالة:</strong></p>
    <p>{{ $data['message'] }}</p>

    <a href="{{ url()->previous() }}">العودة للخلف</a>
</body>

</html>
