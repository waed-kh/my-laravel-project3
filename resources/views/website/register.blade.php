
<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>إنشاء حساب جديد </title>
        <div id="fb-root"></div>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v18.0&appId=YOUR_APP_ID" nonce="random_nonce">
        </script>
        
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
        <style>
            :where([class^="ri-"])::before {
                content: "\f3c2";
            }
    .password-strength {
        height: 4px;
        width: 0%;
        background-color: transparent;
        transition: width 0.3s, background-color 0.3s;
    }



            body {
                font-family: 'Tajawal', sans-serif;
            }

            .show-password-toggle:checked~.password-toggle-icon .show-icon {
                display: none;
            }

            .show-password-toggle:not(:checked)~.password-toggle-icon .hide-icon {
                display: none;
            }

            input[type="checkbox"] {
                appearance: none;
                -webkit-appearance: none;
                width: 18px;
                height: 18px;
                border: 2px solid #cbd5e1;
                border-radius: 4px;
                position: relative;
                cursor: pointer;
                outline: none;
            }

            input[type="checkbox"]:checked {
                background-color: #3b82f6;
                border-color: #3b82f6;
            }

            input[type="checkbox"]:checked::after {
                content: "";
                position: absolute;
                width: 5px;
                height: 10px;
                border: solid white;
                border-width: 0 2px 2px 0;
                top: 1px;
                left: 5px;
                transform: rotate(45deg);
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

            input[type="radio"] {
                appearance: none;
                -webkit-appearance: none;
                width: 18px;
                height: 18px;
                border: 2px solid #cbd5e1;
                border-radius: 50%;
                position: relative;
                cursor: pointer;
                outline: none;
            }

            input[type="radio"]:checked {
                border-color: #3b82f6;
            }

            input[type="radio"]:checked::after {
                content: "";
                position: absolute;
                width: 10px;
                height: 10px;
                background-color: #3b82f6;
                border-radius: 50%;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>

    <body class="bg-gray-50 min-h-screen">
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- القسم الأيسر: الصورة والشعار -->
            <div
                class="hidden md:flex md:w-1/2 bg-gradient-to-br from-blue-50 to-blue-100 items-center justify-center relative p-8">
                <div class="text-center">
                    <div class="mb-8">
                        <h1 class="text-4xl font-['Pacifico'] text-primary mb-2">بكرة</h1>
                        <p class="text-gray-600 text-lg">منصة المشاريع والخدمات المحلية</p>
                    </div>
                  <img src="{{asset('backend/assets/img/popo.jpg')}}"
                        alt="منصة المشاريع" class="rounded-xl shadow-lg mx-auto max-w-md object-cover object-top">
                    <div class="mt-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">انضم إلينا اليوم</h2>
                        <p class="text-gray-600">سجل حسابك الآن واستفد من خدماتنا المتميزة لتطوير أعمالك وتسويق مشاريعك
                            بأفضل الطرق</p>
                    </div>
                </div>
            </div>
            <!-- القسم الأيمن: نموذج إنشاء حساب -->
            <div class="w-full md:w-1/2 flex items-center justify-center p-4 md:p-8">
                <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 w-full max-w-md">
                    <div class="text-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">إنشاء حساب جديد</h1>
                        <p class="text-gray-500">مرحباً بك! يرجى إدخال بياناتك لإنشاء حساب جديد</p>
                    </div>
                    <form action="{{ route('register_save') }}" method="POST" id="registerForm" class="space-y-4">
    @csrf

    <!-- الاسم الكامل -->
    <div class="space-y-2">
        <label for="fullName" class="block text-sm font-medium text-gray-700">الاسم الكامل</label>
        <div class="relative">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="ri-user-line text-gray-400 w-5 h-5 flex items-center justify-center"></i>
            </div>
            <input type="text" name="name" id="fullName"
                class="w-full pr-10 py-3 border @error('name') border-red-500 @else border-gray-300 @enderror rounded focus:outline-none text-sm"
                placeholder="أدخل اسمك الكامل" value="{{ old('name') }}">
        </div>
        @error('name')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>

    <!-- البريد الإلكتروني -->
    <div class="space-y-2">
        <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
        <div class="relative">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="ri-mail-line text-gray-400 w-5 h-5 flex items-center justify-center"></i>
            </div>
            <input type="email" name="email" id="email"
                class="w-full pr-10 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror rounded focus:outline-none text-sm"
                placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}">
        </div>
        @error('email')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>

    <!-- كلمة المرور -->
    <div class="space-y-2">
        <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
        <div class="relative">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="ri-lock-line text-gray-400 w-5 h-5 flex items-center justify-center"></i>
            </div>
            <input type="password" name="password" id="password"
                class="w-full pr-10 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror rounded focus:outline-none text-sm"
                placeholder="أدخل كلمة المرور">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <input type="checkbox" id="showPassword" class="hidden">
                <label for="showPassword" class="cursor-pointer flex items-center">
                    <span class="show-icon text-gray-400 w-5 h-5"><i class="ri-eye-line"></i></span>
                    <span class="hide-icon text-gray-400 w-5 h-5 hidden"><i class="ri-eye-off-line"></i></span>
                </label>
            </div>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-1 mt-1">
            <div id="passwordStrength" class="password-strength rounded-full"></div>
        </div>
        @error('password')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>

    <!-- تأكيد كلمة المرور -->
    <div class="space-y-2">
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">تأكيد كلمة المرور</label>
        <div class="relative">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="ri-lock-line text-gray-400 w-5 h-5 flex items-center justify-center"></i>
            </div>
            <input type="password" name="password_confirmation" id="confirmPassword"
                class="w-full pr-10 py-3 border border-gray-300 rounded focus:outline-none text-sm"
                placeholder="أعد إدخال كلمة المرور">
                <p id="confirmPasswordError" class="text-red-500 text-xs hidden">كلمات المرور غير متطابقة</p>

        </div>
    </div>

    <!-- نوع الحساب -->
    <div class="space-y-2">
        <label class="block text-sm font-medium text-gray-700">نوع الحساب</label>
        <div class="flex space-x-4 space-x-reverse">
            <div class="flex items-center">
                <input type="radio" id="freelancer" name="role" value="user" class="ml-2" {{ old('role') === 'user' ? 'checked' : '' }}>
                <label for="freelancer" class="text-sm text-gray-700">مستقل</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="owner" name="role" value="owner" class="ml-2" {{ old('role') === 'owner' ? 'checked' : '' }}>
                <label for="owner" class="text-sm text-gray-700">صاحب مشروع</label>
            </div>
        </div>
        @error('role')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>

    <!-- الشروط والأحكام -->
    <div class="flex items-center">
        <input type="checkbox" id="terms" name="terms" class="ml-2" {{ old('terms') ? 'checked' : '' }}>
        <label for="terms" class="text-sm text-gray-600">
            أوافق على <a href="#" class="text-primary hover:underline">الشروط والأحكام</a> و
            <a href="#" class="text-primary hover:underline">سياسة الخصوصية</a>
        </label>
    </div>
    @error('terms')
        <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror

    <!-- زر التسجيل -->
    <button type="submit"
        class="w-full bg-primary text-white py-3 rounded-button font-medium hover:bg-blue-600 transition duration-300 whitespace-nowrap">
        إنشاء حساب
    </button>
</form>


                    <!-- العودة إلى تسجيل الدخول -->
                    <div class="text-center mt-6">
                        <p class="text-gray-600">لديك حساب بالفعل؟ <a
                                href="{{route('login')}}"
                                data-readdy="true" class="text-primary font-medium hover:underline">تسجيل الدخول</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId: 'YOUR_APP_ID',
                    cookie: true,
                    xfbml: true,
                    version: 'v18.0'
                });
            };

            document.addEventListener('DOMContentLoaded', function() {
                const fullNameInput = document.getElementById('fullName');
                const facebookLoginBtn = document.getElementById('facebookLoginBtn');

                facebookLoginBtn.addEventListener('click', function() {
                    FB.login(function(response) {
                        if (response.authResponse) {
                            FB.api('/me', {
                                fields: 'name,email,picture'
                            }, function(response) {
                                if (response && !response.error) {
                                    document.getElementById('fullName').value = response.name;
                                    document.getElementById('email').value = response.email ||
                                        '';

                                    const successPopup = document.createElement('div');
                                    successPopup.className =
                                        'fixed top-4 right-4 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 z-50';
                                    successPopup.innerHTML = `
                        <div class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center ml-2">
                                <i class="ri-checkbox-circle-line text-green-500"></i>
                            </div>
                            <p>تم استيراد بياناتك من فيسبوك بنجاح</p>
                        </div>
                    `;
                                    document.body.appendChild(successPopup);

                                    setTimeout(() => {
                                        successPopup.remove();
                                    }, 3000);
                                }
                            });
                        }
                    }, {
                        scope: 'public_profile,email'
                    });
                });
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('confirmPassword');
                const phoneInput = document.getElementById('phone');
                const termsCheckbox = document.getElementById('terms');
                const fullNameError = document.getElementById('fullNameError');
                const emailError = document.getElementById('emailError');
                const passwordError = document.getElementById('passwordError');
                const confirmPasswordError = document.getElementById('confirmPasswordError');
                const phoneError = document.getElementById('phoneError');
                const termsError = document.getElementById('termsError');
                const passwordStrength = document.getElementById('passwordStrength');
                const showPasswordToggle = document.getElementById('showPassword');
                const registerForm = document.getElementById('registerForm');
                // التحقق من الاسم الكامل
                fullNameInput.addEventListener('blur', function() {
                    if (fullNameInput.value.trim() === '') {
                        fullNameError.classList.remove('hidden');
                        fullNameInput.classList.add('border-red-500');
                    } else {
                        fullNameError.classList.add('hidden');
                        fullNameInput.classList.remove('border-red-500');
                    }
                });
                // التحقق من البريد الإلكتروني
                emailInput.addEventListener('blur', function() {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(emailInput.value) && emailInput.value !== '') {
                        emailError.classList.remove('hidden');
                        emailInput.classList.add('border-red-500');
                    } else {
                        emailError.classList.add('hidden');
                        emailInput.classList.remove('border-red-500');
                    }
                });
                // التحقق من قوة كلمة المرور
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
                    // التحقق من تطابق كلمات المرور
                    if (confirmPasswordInput.value !== '' && confirmPasswordInput.value !== password) {
                        confirmPasswordError.classList.remove('hidden');
                        confirmPasswordInput.classList.add('border-red-500');
                    } else if (confirmPasswordInput.value !== '') {
                        confirmPasswordError.classList.add('hidden');
                        confirmPasswordInput.classList.remove('border-red-500');
                    }
                });
                // التحقق من تطابق كلمات المرور
                confirmPasswordInput.addEventListener('blur', function() {
                    if (confirmPasswordInput.value !== passwordInput.value) {
                        confirmPasswordError.classList.remove('hidden');
                        confirmPasswordInput.classList.add('border-red-500');
                    } else {
                        confirmPasswordError.classList.add('hidden');
                        confirmPasswordInput.classList.remove('border-red-500');
                    }
                });

                // إظهار/إخفاء كلمة المرور
                showPasswordToggle.addEventListener('change', function() {
                    passwordInput.type = this.checked ? 'text' : 'password';
                });
                // منع إرسال النموذج إذا كانت هناك أخطاء
                registerForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    let isValid = true;
                    // التحقق من الاسم الكامل
                    if (fullNameInput.value.trim() === '') {
                        fullNameError.classList.remove('hidden');
                        fullNameInput.classList.add('border-red-500');
                        isValid = false;
                    }
                    // التحقق من البريد الإلكتروني
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(emailInput.value)) {
                        emailError.classList.remove('hidden');
                        emailInput.classList.add('border-red-500');
                        isValid = false;
                    }
                    // التحقق من كلمة المرور
                    if (passwordInput.value.length < 8) {
                        passwordError.classList.remove('hidden');
                        passwordInput.classList.add('border-red-500');
                        isValid = false;
                    }
                    // التحقق من تطابق كلمات المرور
                    if (confirmPasswordInput.value !== passwordInput.value) {
                        confirmPasswordError.classList.remove('hidden');
                        confirmPasswordInput.classList.add('border-red-500');
                        isValid = false;
                    }

                    // التحقق من الموافقة على الشروط
                    if (!termsCheckbox.checked) {
                        termsError.classList.remove('hidden');
                        isValid = false;
                    } else {
                        termsError.classList.add('hidden');
                    }
                    if (isValid) {
                        // إرسال النموذج إلى الخادم (هنا يمكن إضافة رمز AJAX للإرسال)
                        alert('تم إنشاء الحساب بنجاح!');
                        registerForm.reset();
                        passwordStrength.className = 'password-strength';
                        passwordStrength.style.width = '0';
                    }
                });
            });


















































            const form = document.getElementById('registerForm');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const confirmPasswordError = document.getElementById('confirmPasswordError');

confirmPasswordInput.addEventListener('input', () => {
    if (confirmPasswordInput.value !== passwordInput.value) {
        confirmPasswordError.classList.remove('hidden');
    } else {
        confirmPasswordError.classList.add('hidden');
    }
});

form.addEventListener('submit', function (e) {
    let valid = true;

    // تحقق من تطابق كلمات المرور
    if (confirmPasswordInput.value !== passwordInput.value) {
        confirmPasswordError.classList.remove('hidden');
        valid = false;
    } else {
        confirmPasswordError.classList.add('hidden');
    }

    // إذا فشل التحقق، امنع الإرسال
    if (!valid) {
        e.preventDefault();
    }
});

























document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const showPasswordCheckbox = document.getElementById('showPassword');
    const showIcon = document.querySelector('.show-icon');
    const hideIcon = document.querySelector('.hide-icon');
    const passwordStrengthBar = document.getElementById('passwordStrength');

    // عرض/إخفاء كلمة المرور
    showPasswordCheckbox.addEventListener('change', function () {
        const type = this.checked ? 'text' : 'password';
        passwordInput.type = type;
        confirmPasswordInput.type = type;

        showIcon.classList.toggle('hidden', this.checked);
        hideIcon.classList.toggle('hidden', !this.checked);
    });

    // قوة كلمة المرور
    passwordInput.addEventListener('input', function () {
        const val = passwordInput.value;
        let strength = 0;

        if (val.length >= 8) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;

        passwordStrengthBar.style.width = `${strength * 25}%`;

        const colors = ['red', 'orange', 'yellow', 'green'];
        passwordStrengthBar.style.backgroundColor = colors[strength - 1] || 'transparent';
    });

    // عرض الوضع الأولي للعين
    showIcon.classList.remove('hidden');
    hideIcon.classList.add('hidden');
});


        </script>
    </body>

</html>