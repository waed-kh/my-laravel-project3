<li class="mt-0.5 w-full">
    <a class="py-2.7 {{ Str::contains(Route::currentRouteName(), 'homePage') ? 'bg-blue-500/13' : '' }} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
        href="{{ route('homePage') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'homePage') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">   الرئيسية</span>
    </a>
</li>


<li class="mt-0.5 w-full">
    <a class=" dark:text-white {{ Str::contains(Route::currentRouteName(), 'category') ? 'bg-blue-500/13' : '' }} dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.category.index') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'category') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tag"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"> التصنيفات</span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white {{ Str::contains(Route::currentRouteName(), 'service') ? 'bg-blue-500/13' : '' }} dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.service.index') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'service') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"> الخدمات</span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white {{ Str::contains(Route::currentRouteName(), 'location') ? 'bg-blue-500/13' : '' }} dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.location.index') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'location') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"> المواقع</span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white {{ Str::contains(Route::currentRouteName(), 'workday') ? 'bg-blue-500/13' : '' }} dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.workday.index') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'workday') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"> اوقات العمل </span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white {{ Str::contains(Route::currentRouteName(), 'project') ? 'bg-blue-500/13' : '' }} dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.project.index') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'project') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"> المشاريع</span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white {{ Str::contains(Route::currentRouteName(), 'testimonial') ? 'bg-blue-500/13' : '' }} dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.testimonial.index') }}">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i
                class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'testimonial') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"> الاّراء</span>
    </a>
</li>
@if(Auth::check())
        <li class="mt-0.5 w-full" style="       display: flex; gap:10px;margin-left:25px ">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal {{ Str::contains(Route::currentRouteName(), 'testimonial') ? 'text-blue-500' : 'text-orange-500' }} ni ni-tv-2"></i>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit"> تسجيل الخروج </button>
            </form>
        </li>
        @endif
       