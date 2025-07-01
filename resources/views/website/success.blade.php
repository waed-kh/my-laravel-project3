<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تمت عملية الدفع بنجاح</title>
  <!-- ربط Bootstrap 5 RTL -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .success-card {
      max-width: 450px;
      width: 100%;
      padding: 30px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      text-align: center;
    }
    .success-icon {
      font-size: 60px;
      color: #198754; /* أخضر Bootstrap */
      margin-bottom: 20px;
    }
    .btn-home {
      margin-top: 25px;
    }
  </style>
</head>
<body>
  <div class="success-card">
    <div class="success-icon">
      <!-- أيقونة علامة صح -->
      <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.03a.75.75 0 1 1-1.06 1.06L7.477 10.94 5.383 8.846a.75.75 0 0 1 1.06-1.06l1.034 1.034 3.493-3.494a.75.75 0 0 1 1.06 0z"/>
      </svg>
    </div>
    <h3 class="mb-3 text-success">تمت عملية الدفع بنجاح</h3>
    <p class="text-muted">
      شكراً لثقتك. تم استلام دفعتك بنجاح ويمكنك الآن الاستفادة من خدماتنا.
    </p>
    <a href="/" class="btn btn-success btn-home">العودة للصفحة الرئيسية</a>
  </div>
</body>
</html>
