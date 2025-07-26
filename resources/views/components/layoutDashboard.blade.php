<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/img/favicon.png') }}" />
    <title>{{ $title }}</title>
    <!-- الخطوط والأيقونات -->
    <link href="https://fonts.googleapis.com/css?family=Amiri:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('backend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Amiri', serif;
            direction: rtl;
            text-align: right;
        }
        .content-here {
            min-height: 470px
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <!-- السايدبار من اليمين -->
    <aside class="fixed inset-y-0 right-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 translate-x-0 bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 xl:mr-6 max-w-64 ease-nav-brand z-990 rounded-2xl xl:right-0">
        <div class="h-19">
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="#">
                <img src="{{ asset('backend/assets/img/logo-ct.png') }}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="الشعار" />
                <span class="mr-1 font-semibold transition-all duration-200 ease-nav-brand">لوحة التحكم</span>
            </a>
        </div>
        <hr class="h-px mt-0 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:via-white" />
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pr-0 mb-0">
                @include('partials.sidebar')
            </ul>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
      <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:mr-68 rounded-xl">
        <!-- Navbar RTL -->
      <nav dir="rtl" class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
     

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                    <span
                        class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                      
                    </span>
                    
                </div>
            </div>

          <ul class="flex flex-row justify-end pr-0 mb-0 list-none md-max:w-full">
    <li class="flex items-center ml-4">
        <a href="{{route('login')}}"
            class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
            <i class="fa fa-user sm:mr-1"></i>
            <span class="hidden sm:inline">تسجيل الدخول</span>
        </a>
    </li>
   
</ul>



        </div>
    </div>
</nav>

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="content-here relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                {{ $slot ?? '' }}
                
               
            </div>
        </div>
    </div>
</div>

    </main>

    <!-- سكربتات -->
    <script src="{{ asset('backend/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('backend/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</body>

</html>
