<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? config('app.name') }}</title>
        <script src="https://cdn.tailwindcss.com/3.4.16"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#4F7CAC',
                            secondary: '#F4A261'
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
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Tajawal:wght@400;500;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/remixicon.css') }}">

        
        <style>
            :where([class^="ri-"])::before {
                content: "\f3c2";
            }

            body {
                font-family: 'Tajawal', sans-serif;
            }

            .hero-section {
                background-image: linear-gradient(to left, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.9) 50%), url("{{asset('images/oi.jpg')}}");
                background-size: cover;
                background-position: center;
            }

            input:focus,
            button:focus {
                outline: none;
            }

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            #logoLink {
                position: relative;
                left: 60px;
                bottom: -3px;
                height: -2px;
               
            }
 


#o9{
    background-color: #4F7CAC;
}
#o10{
    color: #4F7CAC;
   
}


        </style>
        @stack('css')
    </head>

    <body class="bg-gray-50 text-gray-800">
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <div class="container mx-auto py-3 flex justify-between items-center">

                <!-- اللوجو + القائمة على أقصى اليمين -->
                <div class="flex items-center gap-4" style="direction: rtl;" s>
                  



          <a href="{{ route('homePage') }}" id="logoLink" class="relative left-4 md:left-16 lg:left-60 bottom-0 block">
        <img src="{{ asset('images/Black White Simple Minimalist Elegant Personal Monogram Logo (1).png') }}" alt="شعار بكرة" class="h-16 w-auto" />
                   </a>
                  <nav class="hidden md:flex" style="position: relative; left: 90px;">
    <ul class="flex space-x-6 space-x-reverse text-gray-700">
        <li>
            <a href="{{ route('homePage') }}"
               class="{{ Route::currentRouteName() == 'homePage' ? 'text-[#4F7CAC]' : 'hover:text-primary' }} font-medium">
                الرئيسية
            </a>
        </li>
        <li>
            <a href="{{ route('projects') }}"
               class="{{ Route::currentRouteName() == 'projects' ? 'text-[#4F7CAC]' : 'hover:text-primary' }} transition">
                عرض المشاريع
            </a>
        </li>

  
  



 <li>
    @auth
        @if (Auth::user()->role !== 'user')
            <a href="{{ route('project.create') }}" 
               class="{{ Route::currentRouteName() == 'project.create' ? 'text-[#4F7CAC]' : 'hover:text-primary' }} transition">
                أضف مشروعك
            </a>
        @endif
    @else
        <a href="{{ route('login') }}" 
           class="{{ Route::currentRouteName() == 'project.create' ? 'text-[#4F7CAC]' : 'hover:text-primary' }} transition">
            أضف مشروعك
        </a>
    @endauth
</li>




        <li>
            <a href="{{ route('contact') }}"
               class="{{ Route::currentRouteName() == 'contact' ? 'text-[#4F7CAC]' : 'hover:text-primary' }} transition">
                تواصل معنا
            </a>
        </li>
    </ul>
</nav>

                </div>
                @if (!Auth::check())
    <!-- تسجيل الدخول و إنشاء حساب على اليسار -->
    <div class="flex items-center gap-4">
        <a href="{{ route('login') }}"
           class="text-sm text-gray-600 {{ Route::currentRouteName() == 'login' ? 'text-primary' : 'hover:text-primary' }} transition">
            تسجيل الدخول
        </a>
        <a href="{{ route('register') }}" id="o9"
           class="text-sm text-white px-4 py-2 rounded hover:bg-primary/90 transition whitespace-nowrap">
            إنشاء حساب
        </a>
    </div>
@else
    <!-- زر تسجيل الخروج باستخدام DELETE -->
    
@endif



@if (Auth::check())
    <div class="flex items-center gap-4">
        <h4 class="text-gray-700 font-medium">{{ Auth::user()->name }}</h4>
        
        <!-- أيقونة تسجيل الخروج -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('delete')
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
    <!-- زر تسجيل الخروج -->

   @if(auth()->check() && auth()->user()->role == 'admin')
    <a href="{{ route('admin.category.index') }}" class="inline-flex items-center px-3 py-2 text-sm text-gray-700 hover:text-blue-600">
        لوحة التحكم
    </a>
@endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" title="تسجيل الخروج" class="text-red-500 hover:text-red-700 transition text-xl">
            <i class="ri-logout-box-r-line" style="transform: scaleX(-1); display: inline-block;"></i>
        </button>
    </form>

    <!-- رابط لوحة التحكم -->
   

    <!-- عنصر ثالث (مثلاً رابط إعدادات) -->
   
</div>


    </div>
@endif






            </div>
        </header>

        {{ $slot }}

        <!-- Footer -->
      <footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- شعار و وصف -->
            <div>
                <a href="#" class="font-['Pacifico'] text-white text-2xl mb-4 inline-block">بكرة</a>
                <p class="text-gray-400 mb-4">منصة تجمع أصحاب المشاريع المنزلية في غزة في مكان واحد</p>
                <div class="flex space-x-4 space-x-reverse">
                    <a href="https://www.facebook.com" class="w-8 h-8 flex items-center justify-center bg-gray-700 rounded-full hover:bg-primary transition">
                        <i class="ri-facebook-fill"></i>
                    </a>
                    <a href="https://www.instagram.com" class="w-8 h-8 flex items-center justify-center bg-gray-700 rounded-full hover:bg-primary transition">
                        <i class="ri-instagram-fill"></i>
                    </a>
                    <a href="https://twitter.com" class="w-8 h-8 flex items-center justify-center bg-gray-700 rounded-full hover:bg-primary transition">
                        <i class="ri-twitter-x-fill"></i>
                    </a>
                    <a href="https://wa.me" class="w-8 h-8 flex items-center justify-center bg-gray-700 rounded-full hover:bg-primary transition">
                        <i class="ri-whatsapp-fill"></i>
                    </a>
                </div>
            </div>

            <!-- التصنيفات -->
            <div>
                <h3 class="font-bold text-lg mb-4">التصنيفات</h3>
                <ul class="space-y-2">
                    @forelse ($categories as $category)
                        <li>
                            <a href="{{ route('projects', ['category' => $category->id]) }}" class="text-gray-400 hover:text-white transition">
                                {{ $category->name }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-400">لا توجد تصنيفات حالياً</li>
                    @endforelse
                </ul>
            </div>

            <!-- المواقع -->
            <div>
                <h3 class="font-bold text-lg mb-4">المواقع</h3>
                <ul class="space-y-2">
                    @forelse ($locations as $location)
                        <li>
                            <a href="{{ route('projects', ['location' => $location->name]) }}" class="text-gray-400 hover:text-white transition">
                                {{ $location->name }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-400">لا توجد مواقع حالياً</li>
                    @endforelse
                </ul>
            </div>

            <!-- التواصل -->
            <div>
                <h3 class="font-bold text-lg mb-4">تواصل معنا</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="ri-map-pin-line ml-2 mt-1"></i>
                        <span class="text-gray-400">غزة، فلسطين</span>
                    </li>
                    <li class="flex items-center">
                        <i class="ri-phone-line ml-2"></i>
                        <span class="text-gray-400">0597654210</span>
                    </li>
                    <li class="flex items-center">
                        <i class="ri-mail-line ml-2"></i>
                        <span class="text-gray-400">info@bkra.ps</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>© 2025 بكرة. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>













  
</script>

        @stack('js')
    </body>

</html>
