<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تم إلغاء الدفع</title>
  <!-- ربط Bootstrap 5 -->
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
    .cancel-card {
      max-width: 450px;
      width: 100%;
      padding: 30px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      text-align: center;
    }
    .cancel-icon {
      font-size: 60px;
      color: #dc3545; /* أحمر Bootstrap */
      margin-bottom: 20px;
    }
    .btn-home {
      margin-top: 25px;
    }
  </style>
</head>
<body>
  <div class="cancel-card">
    <div class="cancel-icon">
      <!-- أيقونة إلغاء -->
      <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.354-9.354a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708L8 7.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
      </svg>
    </div>
    <h3 class="mb-3 text-danger">تم إلغاء عملية الدفع</h3>
    <p class="text-muted">
      لم تكتمل عملية الدفع. يمكنك العودة إلى الصفحة السابقة أو المحاولة مرة أخرى لاحقًا.
    </p>
    <a href="/" class="btn btn-danger btn-home">العودة للصفحة الرئيسية</a>
  </div>
</body>
</html>
