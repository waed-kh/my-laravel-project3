<style>
    .contact-hero {
  background-image: linear-gradient(to left, rgba(79, 124, 172, 0.05), rgba(79, 124, 172, 0.2)), url("{{asset('images/cc.jpg')}}");
  background-size: cover;
  background-position: center;
  min-height: 600px; /* 👈 هنا التعديل */
}
.map-container {
background-image: url("{{asset('images/lp.png')}}");
background-size: cover;
background-position: center;
}
    </style>
<x-layoutWebSite title="تواصل معنا">
    <!-- Hero Section -->
    <!-- القسم العلوي (Hero) مع صورة -->
    <section class="contact-hero relative bg-cover bg-center" style="min-height: 600px;">
        @if (session('success'))
            <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div
            class="container mx-auto px-4 w-full h-full flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4" style="padding: 50px;">تواصل معنا</h1>
            <p class="text-lg font-bold" style="padding-bottom: 20px ;">يسعدنا الرد على جميع استفساراتكم واقتراحاتكم
            </p>
        </div>
    </section>

    <!-- مربعات التواصل تطفو فوق الحد بين القسمين -->
    <section class=" relative z-10">
        <div class=" container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 -mt-40"> <!-- المربعات ترتفع للأعلى -->
                <!-- مربع 1 -->
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-4">
                        <i id="o10" class="ri-phone-line ri-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">اتصل بنا</h3>
                    <p class="text-gray-600 mb-3">نحن متاحون للرد على استفساراتك</p>
                    <a href="tel:+97059123456" id="o10" class="hover:text-primary/80 font-medium">+970 59 123
                        4567</a>
                </div>
                <!-- مربع 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-4">
                        <i  id="o10"class="ri-mail-line ri-xl" id="o110"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">راسلنا</h3>
                    <p class="text-gray-600 mb-3">سنرد على رسائلك في أقرب وقت ممكن</p>
                    <a href="mailto:info@riwaq.ps"
                      id="o10"  class="hover:text-primary/80 font-medium">info@riwaq.ps</a>
                </div>
                <!-- مربع 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-4">
                        <i id="o10" class="ri-map-pin-line ri-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">زورنا</h3>
                    <p class="text-gray-600 mb-3">يسعدنا استقبالك في مكتبنا</p>
                    <span class="text-gray-700">غزة، الرمال، شارع الوحدة، برج الغفري</span>
                </div>
            </div>
        </div>
    </section>



    <!-- Contact Form and Map Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-sm p-8">
                    <h2  class="text-2xl font-bold mb-6">أرسل رسالة</h2>
                    <form action="{{ route('contact') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">الاسم الكامل</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800"
                                placeholder="أدخل اسمك الكامل">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">البريد الإلكتروني</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800"
                                placeholder="أدخل بريدك الإلكتروني">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 mb-2">الموضوع</label>
                            <input type="text" name="subject" id="subject"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800"
                                placeholder="أدخل موضوع الرسالة">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 mb-2">الرسالة</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 resize-none"
                                placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                        <button type="submit"
                           id="o9"  class="text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">
                            إرسال الرسالة
                        </button>
                    </form>
                </div>
                <!-- Map -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">موقعنا</h2>
                    <div class="map-container h-[400px] rounded-lg shadow-sm overflow-hidden"></div>
                </div>
            </div>
    </section>
    <!-- FAQ Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">الأسئلة الشائعة</h2>
            <div class="max-w-3xl mx-auto">
                <div class="mb-4">
                    <div class="bg-gray-50 p-4 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold">كيف يمكنني إضافة مشروعي على المنصة؟</h3>
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-gray-600 hidden">
                            يمكنك إضافة مشروعك من خلال الضغط على "أضف مشروعك" في القائمة الرئيسية، ثم ملء النموذج
                            بالمعلومات المطلوبة وإرفاق الصور. بعد المراجعة سيتم نشر مشروعك على المنصة.
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="bg-gray-50 p-4 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold">هل الاشتراك في المنصة مجاني؟</h3>
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-gray-600 hidden">
                            نعم، الاشتراك في منصة بكرة مجاني تماماً لأصحاب المشاريع المنزلية والمستخدمين الباحثين عن
                            الخدمات.
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="bg-gray-50 p-4 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold">كيف يمكنني التواصل مع صاحب المشروع؟</h3>
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-gray-600 hidden">
                            يمكنك التواصل مع صاحب المشروع من خلال الضغط على زر "اتصال" أو "مراسلة" الموجود في صفحة
                            المشروع، وسيتم توجيهك للتواصل المباشر معه.
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="bg-gray-50 p-4 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold">هل يمكنني تقييم المشاريع التي تعاملت معها؟</h3>
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-gray-600 hidden">
                            نعم، بعد التعامل مع أي مشروع يمكنك تقييمه وكتابة مراجعة لمساعدة المستخدمين الآخرين في
                            اختياراتهم.
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="bg-gray-50 p-4 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold">ما هي مناطق تغطية الخدمة؟</h3>
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-gray-600 hidden">
                            تغطي منصة بكرة جميع مناطق قطاع غزة بما فيها غزة، خان يونس، رفح، دير البلح، بيت لاهيا
                            وغيرها.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Social Media Section -->
    <section class="py-12 bg-primary/5">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-6">تابعنا على وسائل التواصل الاجتماعي</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">تابعنا للحصول على آخر الأخبار والتحديثات حول المشاريع
                الجديدة والعروض الخاصة</p>
            <div class="flex justify-center gap-4">
                <a href="#"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-primary hover:text-white transition">
                    <i class="ri-facebook-fill ri-lg"></i>
                </a>
                <a href="#"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-primary hover:text-white transition">
                    <i class="ri-instagram-fill ri-lg"></i>
                </a>
                <a href="#"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-primary hover:text-white transition">
                    <i class="ri-twitter-x-fill ri-lg"></i>
                </a>
                <a href="#"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-primary hover:text-white transition">
                    <i class="ri-whatsapp-fill ri-lg"></i>
                </a>
                <a href="#"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-primary hover:text-white transition">
                    <i class="ri-youtube-fill ri-lg"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Newsletter Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto bg-primary/10 rounded-lg p-8 text-center">
                <h2 class="text-2xl font-bold mb-4">اشترك في نشرتنا الإخبارية</h2>
                <p class="text-gray-600 mb-6">احصل على آخر الأخبار والتحديثات عن المشاريع الجديدة والعروض الخاصة
                </p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" placeholder="أدخل بريدك الإلكتروني"
                        class="flex-1 px-4 py-3 rounded border-none text-sm">
                    <button type="submit"
                      id="o9"   class=" text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">
                        اشتراك
                    </button>
                </form>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            setTimeout(() => {
                const alertElement = document.querySelector('.alert')
                if (alertElement) {
                    alertElement.style.transition = 'opacity 0.5s ease';
                    alertElement.style.opacity = '0';

                    setTimeout(() => {
                        alertElement.style.display = 'none';
                    }, 500);
                }
            }, 3000);
        </script>
    @endpush
</x-layoutWebSite>
