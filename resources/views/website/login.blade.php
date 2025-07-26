<!-- تم الإبقاء على نفس التصميم السابق تماماً، فقط أضفنا عرض رسالة الخطأ من Laravel بدون تغيير في التصميم -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول </title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#64748b'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        .show-password-toggle:checked~.password-toggle-icon .show-icon {
            display: none;
        }

        .show-password-toggle:not(:checked)~.password-toggle-icon .hide-icon {
            display: none;
        }

        .password-strength {
            height: 4px;
            transition: all 0.3s;
        }

        .password-strength.weak {
            width: 30%;
            background-color: #ef4444;
        }

        .password-strength.medium {
            width: 60%;
            background-color: #f59e0b;
        }

        .password-strength.strong {
            width: 100%;
            background-color: #10b981;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-blue-50 to-blue-100 items-center justify-center relative p-8">
            <div class="text-center">
                <div class="mb-8">
                    <h1 class="text-4xl font-['Pacifico'] text-primary mb-2">بكرة</h1>
                    <p class="text-gray-600 text-lg">منصة المشاريع والخدمات المحلية</p>
                </div>
                <img src="{{asset('backend/assets/img/waed.jpg')}}"
                    alt="منصة المشاريع" class="rounded-xl shadow-lg mx-auto max-w-md object-cover object-top">
                <div class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-3">أطلق مشروعك اليوم</h2>
                    <p class="text-gray-600">اكتشف أفضل المواهب المحلية لإنجاز مشاريعك بكفاءة عالية وأسعار منافسة</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-4 md:p-8">
            <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 w-full max-w-md">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">تسجيل الدخول</h1>
                    <p class="text-gray-500">مرحباً بعودتك! يرجى إدخال بياناتك للوصول إلى حسابك</p>
                </div>

                <!-- هنا نعرض رسالة الخطأ إن وُجدت -->
                @if (session('error'))
                    <div class="mb-4 text-sm text-red-600 bg-red-100 px-4 py-2 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" id="loginForm" class="space-y-5">
                    @csrf
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i class="ri-mail-line text-gray-400"></i>
                            </div>

                               
                            <input type="email" name="email" id="email"
                                value="{{ old('email') }}"
                                class="w-full pr-10 py-3 border border-gray-300 rounded text-sm focus:outline-none focus:ring-0 focus:border-gray-300"
                                placeholder="أدخل بريدك الإلكتروني">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i class="ri-lock-line text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="password"
                                class="w-full pr-10 py-3 border border-gray-300 rounded text-sm focus:outline-none focus:ring-0 focus:border-gray-300"
                                placeholder="أدخل كلمة المرور">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <input type="checkbox" id="showPassword" class="show-password-toggle hidden">
                                <label for="showPassword" class="password-toggle-icon cursor-pointer">
                                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 show-icon">
                                        <i class="ri-eye-line"></i>
                                    </div>
                                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 hide-icon">
                                        <i class="ri-eye-off-line"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <p id="passwordError" class="text-red-500 text-xs hidden">كلمة المرور يجب أن تكون 8 أحرف على الأقل</p>
                        <div id="passwordStrength" class="password-strength"></div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="ml-2">
                            <label for="remember" class="text-sm text-gray-600">تذكرني</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm text-primary hover:text-primary-dark">نسيت كلمة المرور؟</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-white py-3 rounded-button font-medium hover:bg-blue-600 transition duration-300 whitespace-nowrap">
                        تسجيل الدخول
                    </button>
                </form>

                <div class="text-center mt-6">
                    <p class="text-gray-600">
                        ليس لديك حساب؟
                        <a href="{{route('register')}}" class="text-primary font-medium hover:underline">
                            إنشاء حساب جديد
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');
            const passwordStrength = document.getElementById('passwordStrength');
            const showPasswordToggle = document.getElementById('showPassword');

            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                if (password.length === 0) {
                    passwordStrength.className = 'password-strength';
                    passwordStrength.style.width = '0';
                } else if (password.length < 6) {
                    passwordStrength.className = 'password-strength weak';
                } else if (password.length < 10) {
                    passwordStrength.className = 'password-strength medium';
                } else {
                    passwordStrength.className = 'password-strength strong';
                }
                if (password.length < 8 && password.length > 0) {
                    passwordError.classList.remove('hidden');
                } else {
                    passwordError.classList.add('hidden');
                }
            });

            showPasswordToggle.addEventListener('change', function() {
                passwordInput.type = this.checked ? 'text' : 'password';
            });
        });
    </script>
</body>

</html>
