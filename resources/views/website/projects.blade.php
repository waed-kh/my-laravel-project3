<x-layoutWebSite title="عرض المشاريع">

    <!-- Page Title -->
    <section class="bg-primary/10 py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">استكشف المشاريع</h1>
            <p class="text-gray-600">اكتشف مجموعة متنوعة من المشاريع المنزلية والحرفية المميزة في غزة</p>
        </div>
    </section>

    <!-- Search and Filter Bar -->
    <section class="bg-white sticky top-[61px] z-40 shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <form action="{{ route('projects') }}" method="get">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Search -->
                    <div class="relative flex-grow">

                        <input type="text" name="search" value="{{ request()->query('search') }}"
                            placeholder="ابحث عن مشاريع..."
                            class="w-full pr-10 pl-4 py-2 bg-gray-50 border border-gray-200 rounded text-gray-800">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <!-- Category Filter -->
                    <div class="relative w-full md:w-48">
                        <select class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-8"
                            id="categoryFilter" name="category">
                            <option value="">جميع التصنيفات</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(request()->query('category') == $category->id)>{{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <!-- Sort Options -->
                    <div class="relative w-full md:w-48">
                        <select name="sortOptions"
                            class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-8"
                            id="sortOptions">
                            <option value="newest" @selected(request()->query('sortOptions') == 'newest')>الأحدث</option>
                            <option value="topRated" @selected(request()->query('sortOptions') == 'topRated')>الأعلى تقييماً</option>
                            <option value="priceLow" @selected(request()->query('sortOptions') == 'priceLow')>السعر: من الأقل للأعلى</option>
                            <option value="priceHigh" @selected(request()->query('sortOptions') == 'priceHigh')>السعر: من الأعلى للأقل</option>
                        </select>
                    </div>
                    <!-- Filter Button (Mobile) -->
                    <button
                        class="md:hidden bg-gray-100 text-gray-700 px-4 py-2 !rounded-button whitespace-nowrap hover:bg-gray-200 transition flex items-center justify-center gap-2"
                        id="mobileFilterToggle">
                        <i class="ri-filter-3-line"></i>
                        <span>تصفية</span>
                    </button>
                </div>
            </form>

            <!-- Active Filters -->
            <div class="flex flex-wrap gap-2 mt-4" id="activeFilters">
                <!-- Will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Mobile Filters Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="filterModal">
        <div class="bg-white rounded-t-lg absolute bottom-0 left-0 right-0 max-h-[80vh] overflow-y-auto">
            <div class="p-4 border-b">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold text-lg">تصفية المشاريع</h3>
                    <button class="w-8 h-8 flex items-center justify-center" id="closeFilterModal">
                        <i class="ri-close-line ri-lg"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <h4 class="font-medium mb-3">التصنيفات</h4>
                <div class="space-y-2 mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="mobile-cat-cooking" class="hidden category-filter">
                        <label for="mobile-cat-cooking"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">طبخ
                            منزلي</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="mobile-cat-crafts" class="hidden category-filter">
                        <label for="mobile-cat-crafts"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">حرف
                            يدوية</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="mobile-cat-design" class="hidden category-filter">
                        <label for="mobile-cat-design"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">تصميم</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="mobile-cat-education" class="hidden category-filter">
                        <label for="mobile-cat-education"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">تعليم
                            خاص</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="mobile-cat-services" class="hidden category-filter">
                        <label for="mobile-cat-services"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">خدمات
                            فردية</label>
                    </div>
                </div>

                <h4 class="font-medium mb-3">نطاق السعر</h4>
                <div class="space-y-4 mb-6">
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label class="block text-sm text-gray-600 mb-1">من</label>
                            <input type="number" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded"
                                placeholder="0">
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm text-gray-600 mb-1">إلى</label>
                            <input type="number" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded"
                                placeholder="1000">
                        </div>
                    </div>
                    <input type="range" min="0" max="1000" value="500"
                        class="w-full h-2 bg-gray-200 rounded-full appearance-none cursor-pointer">
                </div>

                <h4 class="font-medium mb-3">التقييم</h4>
                <div class="space-y-2 mb-6">
                    <div class="flex items-center">
                        <input type="radio" name="rating" id="rating-all" class="hidden">
                        <label for="rating-all"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">الكل</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="rating" id="rating-4plus" class="hidden">
                        <label for="rating-4plus"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">4
                            نجوم وأعلى</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="rating" id="rating-3plus" class="hidden">
                        <label for="rating-3plus"
                            class="flex-1 py-2 px-4 bg-gray-100 rounded cursor-pointer text-center hover:bg-gray-200 transition">3
                            نجوم وأعلى</label>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button
                        class="flex-1 bg-gray-200 text-gray-700 px-4 py-3 !rounded-button whitespace-nowrap hover:bg-gray-300 transition">
                        إعادة ضبط
                    </button>
                    <button
                        class="flex-1 bg-primary text-white px-4 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">
                        تطبيق الفلتر
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach (@$projects as $project)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden project-card">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ @$project->img_path }}" alt="{{ @$project->title }}"
                                class="w-full h-full object-cover object-top project-image">
                            <div class="absolute top-3 right-3">
                                <span
                                    class="bg-primary/90 text-white text-xs py-1 px-2 rounded-full">{{ @$project->category->name }}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-1">{{ @$project->title }}</h3>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ @$project->description }}</p>
                            <div class="flex items-center mb-3">
                                <div class="flex rating-stars ml-1">
                                    <i class="ri-star-fill active"></i>
                                    <i class="ri-star-fill active"></i>
                                    <i class="ri-star-fill active"></i>
                                    <i class="ri-star-fill active"></i>
                                    <i class="ri-star-half-fill active"></i>
                                </div>
                                <span class="text-sm text-gray-600">4.5 (120 تقييم)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg text-primary">₪{{ @$project->min_price }} -
                                    ₪{{ @$project->max_price }}</span>
                                <a href="{{ route('project', @$project->id) }}"
                                    class="bg-primary/10 text-primary px-3 py-1 !rounded-button whitespace-nowrap hover:bg-primary/20 transition text-sm">
                                    عرض التفاصيل
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="mt-12 flex flex-col items-center">
                <div class="flex items-center space-x-1 space-x-reverse">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-12 bg-primary/5">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-bold mb-4">اشترك في نشرتنا الإخبارية</h2>
                <p class="text-gray-600 mb-6">احصل على آخر الأخبار والتحديثات عن المشاريع الجديدة والعروض الخاصة
                </p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" placeholder="أدخل بريدك الإلكتروني"
                        class="flex-1 px-4 py-3 rounded border-none text-sm">
                    <button type="submit" id="o9"
                        class=" text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">
                        اشتراك
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-layoutWebSite>
