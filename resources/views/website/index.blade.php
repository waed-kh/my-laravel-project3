
<x-layoutWebSite>
    <!-- Hero Section -->
    <section class="hero-section py-16 md:py-24">
        <div class="container mx-auto px-4 w-full">
            <div class="max-w-xl">
                <form action="{{ route('homePage') }}" method="get">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-gray-800">اكتشف المشاريع المنزلية
                        المميزة في غزة</h1>
                    <p class="text-gray-600 mb-8 text-lg">منصة تجمع أصحاب المشاريع الصغيرة والخدمات المنزلية في مكان
                        واحد</p>
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <div class="w-full relative">
                                <input type="text" name="search" placeholder="ابحث عن مشروع أو خدمة..."
                                    class="w-full py-3 px-4 pr-12 border-none bg-gray-100 rounded">
                                <div
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 w-6 h-6 flex items-center justify-center text-gray-400">
                                    <i class="ri-search-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600 text-sm">التصنيف:</span>
                                <select name="category"
                                    class="bg-gray-100 border-none rounded py-2 pr-4 pl-8 text-sm appearance-none">
                                    <option value="">جميع التصنيفات</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>

                            </div>


                             <div class="flex items-center gap-2">
                                <span class="text-gray-600 text-sm">التصنيف:</span>
                                <select name="category"
                                    class="bg-gray-100 border-none rounded py-2 pr-4 pl-8 text-sm appearance-none">
                                    <option value="">جميع التصنيفات</option>
                                    @foreach ($locations as $l)
                                        <option value="{{ $l->id }}">{{ $l->name }}</option>
                                    @endforeach

                                </select>
                                
                            </div>
                           
                        <button
    class="text-white px-6 py-2 rounded-button whitespace-nowrap hover:bg-primary/90 transition mr-auto" id="o9">
    بحث
</button>


                           

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Categories Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">تصفح حسب التصنيف</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach ($categories->take(5) as $category)
                    <a href="#" class="flex flex-col items-center group">
                        <div
                            class="w-20 h-20 flex items-center justify-center bg-blue-50 rounded-full mb-3 group-hover:bg-primary/10 transition">
                            <i class="ri-restaurant-line ri-xl text-primary"></i>
                        </div>
                        <span class="text-gray-700 group-hover:text-primary transition">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Projects -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">المشاريع المميزة</h2>
                <div class="flex gap-2 px-1 py-1 bg-gray-200 rounded-full">
                    <button
                        class="px-4 py-2 bg-white text-primary rounded-full shadow-sm whitespace-nowrap">الأحدث</button>
                    <button class="px-4 py-2 text-gray-600 rounded-full whitespace-nowrap">الأعلى تقييماً</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Project Card 1 -->
                @foreach ($projects as $project)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ $project->img_path }}" alt="{{ $project->title }}"
                                class="w-full h-full object-cover object-top">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg">{{ $project->title }}</h3>
                                <span
                                    class="bg-blue-50 text-primary text-xs px-2 py-1 rounded">{{ $project->category->name }}</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">{{ $project->description }}</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <span class="text-gray-600 text-sm mr-1">(32)</span>
                                </div>
                                <span class="text-gray-500 text-sm flex items-center">
                                    <i class="ri-map-pin-line ml-1"></i>
                                    {{ $project->location }}
                                </span>
                            </div>
                        </div>

 <a href="{{ route('stripe.session', $project->id) }}"
  id="o9"  class="btn-pay text-white px-4 py-2 rounded block text-center mt-3">
    شراء الخدمة
</a>



                        <div class="border-t border-gray-100 p-4 flex justify-between">
                            <button class="text-primary flex items-center text-sm">
                                <i class="ri-phone-line ml-1"></i>
                                اتصال
                            </button>
                            <button class="text-primary flex items-center text-sm">
                                <i class="ri-message-2-line ml-1"></i>
                                مراسلة
                            </button>
                            <button class="text-primary flex items-center text-sm">
                                <i class="ri-heart-line ml-1"></i>
                                حفظ
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('projects') }}"
                    class="bg-white border border-primary text-primary px-6 py-2 !rounded-button whitespace-nowrap hover:bg-primary/5 transition">
                    عرض المزيد من المشاريع
                </a>
            </div>
        </div>
    </section>
    <!-- How it Works -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-12 text-center">كيف يعمل بكرة؟</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mx-auto mb-4">
                        <i class="ri-search-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">ابحث عن مشروع</h3>
                    <p class="text-gray-600">تصفح المشاريع المنزلية حسب التصنيف أو المنطقة واعثر على ما تحتاجه</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mx-auto mb-4">
                        <i class="ri-message-3-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">تواصل مع صاحب المشروع</h3>
                    <p class="text-gray-600">اتصل أو راسل صاحب المشروع مباشرة للاستفسار أو طلب الخدمة</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mx-auto mb-4">
                        <i class="ri-star-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">قيّم التجربة</h3>
                    <p class="text-gray-600">شارك تجربتك مع الآخرين من خلال تقييم المشروع وكتابة مراجعة</p>
                </div>
            </div>
            <div class="mt-12 text-center">
                <p class="text-gray-600 mb-4">هل لديك مشروع منزلي وترغب في عرضه؟</p>
                <a href="{{ route('project.create') }}"
                  id="o9"  class="text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">
                    أضف مشروعك الآن
                </a>
            </div>
        </div>
    </section>
    <!-- Testimonials -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">آراء المستخدمين</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($testimonial->rate >= $i)
                                    <div class="text-yellow-400">
                                        <i class="ri-star-fill text-yellow-400"></i>
                                    </div>
                                    @continue
                                @endif
                                <i class="ri-star-fill"></i>
                            @endfor

                        </div>
                        <p class="text-gray-600 mb-4">{{ $testimonial->content }}</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex items-center justify-center bg-primary/10 rounded-full ml-3">
                                <i class="ri-user-line text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">{{ $testimonial->user->name }}</h4>
                                <p class="text-gray-500 text-sm">{{ $testimonial->user->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Call to Action -->
    <section class="py-16 bg-primary/5">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">انضم إلى مجتمع بكرة اليوم</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">سواء كنت تبحث عن خدمات منزلية مميزة أو ترغب في عرض
                مشروعك، بكرة هو المكان المثالي لك. انضم إلينا الآن واستفد من منصتنا المتكاملة.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                    class="text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition" id="o9">
                    إنشاء حساب جديد
                </a>
                <a href="{{ route('projects') }}"
                    class="bg-white border border-primary  px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/5 transition" id="o10">
                    تصفح المشاريع
                </a>
            </div>
        </div>
    </section>

    
   <!-- Stripe CDN -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stripe = Stripe("{{ env('STRIPE_KEY') }}"); // المفتاح العام من .env

        let payButtons = document.querySelectorAll('.btn-pay');

        payButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                fetch(button.getAttribute('href'))
                    .then(response => response.json())
                    .then(data => {
                        stripe.redirectToCheckout({
                            sessionId: data.session_id
                        });
                    })
                    .catch(error => {
                        alert('حدث خطأ أثناء تنفيذ الدفع!');
                        console.error(error);
                    });
            });
        });
    });
</script>



    
</x-layoutWebSite>
