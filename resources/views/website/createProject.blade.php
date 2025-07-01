@push('css')
    <style>
     #logoLink {
                position: relative;
                left: 38px !important;
                bottom: -3px;
                height: -2px;

            }
 
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: "Tajawal", sans-serif;
        }

        input:focus,
        button:focus,
        textarea:focus,
        select:focus {
            outline: none;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #logoLink {
            position: relative;
            left: 120px;
            bottom: -3px;
            height: -2px;
        }

        .add-project-hero {
            background-image: linear-gradient(to left,
                    rgba(79, 124, 172, 0.05),
                    rgba(79, 124, 172, 0.2)),
               url("{{asset('images/cam.jpg')}}");
            background-size: cover;
            background-position: center;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
            display: none;
        }

        .custom-checkbox {
            appearance: none;
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-checkbox:checked {
            background-color: #4f7cac;
            border-color: #4f7cac;
        }

        .custom-checkbox:checked::after {
            content: "";
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            margin-bottom: 2px;
        }

        .time-slot-checkbox {
            display: none;
        }

        .time-slot-checkbox:checked+label {
            background-color: #4f7cac;
            color: white;
            border-color: #4f7cac;
        }
        #pp{
            position: absolute;
           right:  40px;
          top: -300px;

          
        }
        #o9{
            background-color: #4f7cac
        }
    </style>
@endpush

  
<x-layoutWebSite title="اضف مشروعك">

      
    <!-- Hero Section -->
    <section class="add-project-hero py-16">
        <div class="container mx-auto px-4 w-full">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-gray-800"></h1>
                <p class="text-gray-600 mb-6 text-lg">/p></p>
            </div>
        </div>
    </section>
    <!-- Form Progress -->
    <section class="py-8 bg-white border-b">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-center">
                        <div id="o9" class="w-10 h-10 flex items-center justify-center text-white rounded-full mb-2">
                            <span>1</span>
                        </div>
                        <span id="o10" class="font-medium text-sm">معلومات المشروع</span>
                    </div>
                    <div class="flex-1 h-1 bg-gray-200 mx-2">
                        <div  id="o9"class="h-full w-2/3"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div
                            class="w-10 h-10 flex items-center justify-center bg-primary/20 rounded-full mb-2">
                            <span>2</span>
                        </div>
                        <span class="text-gray-500 font-medium text-sm">معلومات التواصل</span>
                    </div>
                    <div class="flex-1 h-1 bg-gray-200 mx-2">
                        <div class="bg-primary/20 h-full w-1/3"></div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div
                            class="w-10 h-10 flex items-center justify-center bg-gray-200 text-gray-500 rounded-full mb-2">
                            <span>3</span>
                        </div>
                        <span class="text-gray-500 font-medium text-sm">المراجعة والنشر</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Project Form -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <form action="{{ route('projectStore') }}" method="POST" id="add-project-form"
                    enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                        <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Basic Project Information -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <div class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full ml-2">
                                <i id="o10" class="ri-store-3-line"></i>
                            </div>
                            معلومات المشروع الأساسية
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="project-name" class="block text-gray-700 mb-2">اسم المشروع <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="title" id="project-name"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800"
                                    placeholder="أدخل اسم المشروع" required />
                            </div>
                            <div>
                                <label for="project-category" class="block text-gray-700 mb-2">تصنيف المشروع <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="project-category" name="category_id"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 appearance-none pr-8"
                                        required>
                                        <option value="" disabled selected>
                                            اختر تصنيف المشروع
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                        <i class="ri-arrow-down-s-line text-gray-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="min_price" class="block text-gray-700 mb-2">اقل سعر للمشروع <span
                                        class="text-red-500">*</span></label>
                                <input type="number" min="0" name="min_price" id="min_price"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800"
                                    placeholder="اقل سعر للمشورع" required />
                            </div>
                            <div>
                                <label for="max_price" class="block text-gray-700 mb-2">اعلى سعر للمشروع <span
                                        class="text-red-500">*</span></label>
                                <input type="text" min="0" name="max_price" id="max_price"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800"
                                    placeholder="اعلى سعر للمشروع" required />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="min_price" class="block text-gray-700 mb-2">طريقة الدفع <span
                                        class="text-red-500">*</span></label>
                                <select id="project-category" name="pricing_type"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 appearance-none pr-8"
                                    required>
                                    <option value="" disabled selected>
                                        اختر طريقة الدفع
                                    </option>
                                    <option value="fixed">ثابت</option>
                                    <option value="hourly">ساعة</option>
                                </select>
                                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="project-description" class="block text-gray-700 mb-2">وصف المشروع <span
                                    class="text-red-500">*</span></label>
                            <textarea name="description" id="project-description" rows="5"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 resize-none"
                                placeholder="اكتب وصفاً تفصيلياً عن مشروعك، الخدمات التي تقدمها، وما يميزك عن الآخرين..." required></textarea>
                            <div class="text-xs text-gray-500 mt-1">
                                الحد الأدنى 100 حرف، الحد الأقصى 500 حرف
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2">خدمات المشروع</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach ($services as $service)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="services[]" value="{{ $service->id }}"
                                            id="service-1" class="custom-checkbox ml-2" />
                                        <label for="service-1" class="text-gray-700">{{ $service->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Contact Information -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <div class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full ml-2">
                                <i id="o10" class="ri-contacts-line"></i>
                            </div>
                            معلومات التواصل
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="contact-phone" class="block text-gray-700 mb-2">رقم الهاتف <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div
                                        class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                        <i class="ri-phone-line"></i>
                                    </div>
                                    <input type="tel" name="phone" id="contact-phone"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                        placeholder="059xxxxxxx" required />
                                </div>
                            </div>
                            <div>
                                <label for="contact-whatsapp" class="block text-gray-700 mb-2">واتساب
                                    (اختياري)</label>
                                <div class="relative">
                                    <div
                                        class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                        <i class="ri-whatsapp-line"></i>
                                    </div>
                                    <input type="tel" name="whatsAppNumber" id="contact-whatsapp"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                        placeholder="059xxxxxxx" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="contact-email" class="block text-gray-700 mb-2">البريد الإلكتروني <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <div
                                    class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                    <i class="ri-mail-line"></i>
                                </div>
                                <input type="email" name="email" id="contact-email"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                    placeholder="example@domain.com" required />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2">وسائل التواصل الاجتماعي (اختياري)</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <div
                                        class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                        <i class="ri-facebook-fill"></i>
                                    </div>
                                    <input type="text" name="facebook_url"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                        placeholder="رابط صفحة الفيسبوك" />
                                </div>
                                <div class="relative">
                                    <div
                                        class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                        <i class="ri-instagram-line"></i>
                                    </div>
                                    <input type="text" name="instagram_url"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                        placeholder="رابط حساب الانستغرام" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Location and Working Hours -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <div class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full ml-2">
                                <i id="o10" class="ri-map-pin-line"></i>
                            </div>
                            الموقع وأوقات العمل
                        </h2>
                        <div class="mb-6">
                            <label for="project-address" class="block text-gray-700 mb-2">عنوان المشروع <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <div
                                    class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                                <input type="text" name="location" id="project-address"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                    placeholder="المدينة، الحي، الشارع" required />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-4">أيام وساعات العمل <span
                                    class="text-red-500">*</span></label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                @foreach ($workdays as $key => $workday)
                                    @php
                                        $day = $key;

                                        switch ($day) {
                                            case 'saturday':
                                                $day = 'السبت';
                                                break;
                                            case 'sunday':
                                                $day = 'الاحد';
                                                break;
                                            case 'monday':
                                                $day = 'الاثنين';
                                                break;
                                            case 'tuesday':
                                                $day = 'الثلاثاء';
                                                break;
                                            case 'Wednesday':
                                                $day = 'الاربعاء';
                                                break;
                                            case 'thursday':
                                                $day = 'الخميس';
                                                break;
                                            case 'friday':
                                                $day = 'الجمعة';
                                                break;
                                        }

                                    @endphp
                                    <div>
                                        <div class="flex items-center mb-3">
                                            <input type="checkbox" name="days[{{ $key }}]"
                                                id="days[{{ $key }}]" class="custom-checkbox ml-2" checked />
                                            <label for="days[{{ $key }}]"
                                                class="text-gray-700 font-medium">{{ $day }}</label>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($workday as $item)
                                                @php
                                                    $time_slot = $item->time_slot;

                                                    switch ($time_slot) {
                                                        case 'morning':
                                                            $time_slot = 'صباحاً';
                                                            break;
                                                        case 'afternoon':
                                                            $time_slot = 'ظهراً';
                                                            break;
                                                        case 'evening':
                                                            $time_slot = 'مساءً';
                                                            break;
                                                        case 'all_day':
                                                            $time_slot = 'طوال اليوم';
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }

                                                @endphp
                                                <input type="radio"
                                                    id="{{ $item->time_slot }}-{{ $item->id }}"
                                                    name="workdays[{{ $key }}]" value="{{ $item->id }}"
                                                    class="time-slot-checkbox" checked />
                                                <label for="{{ $item->time_slot }}-{{ $item->id }}"
                                                    class="px-3 py-1 border border-gray-200 rounded text-sm cursor-pointer">{{ $time_slot }}
                                                    @if ($item->time_slot == 'all_day')
                                                    @else
                                                        ({{ $item->from_time->format('h') }}-{{ $item->to_time->format('h') }})
                                                    @endif
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- Project Images -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <div class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full ml-2">
                                <i id="o10" class="ri-image-line"></i>
                            </div>
                            صور المشروع
                        </h2>
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2">صورة الغلاف الرئيسية
                                <span class="text-red-500">*</span></label>
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition cursor-pointer relative">
                                <input type="file" name="image" id="cover-image" accept="image/*"
                                    class="custom-file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    required />
                                <div class="flex flex-col items-center justify-center">
                                    <div
                                        class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-4">
                                        <i id="o10" class="ri-upload-cloud-line ri-2x"></i>
                                    </div>
                                    <p class="text-gray-700 font-medium mb-1">
                                        اسحب وأفلت الصورة هنا
                                    </p>
                                    <p class="text-gray-500 text-sm mb-2">
                                        أو انقر لاختيار صورة
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        JPG, PNG أو GIF. الحد الأقصى 5 ميجابايت
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2">صور إضافية للمشروع (حتى 5 صور)</label>
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition cursor-pointer relative">
                                <input type="file" name="gallery[]" id="additional-images" accept="image/*"
                                    multiple
                                    class="custom-file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                                <div class="flex flex-col items-center justify-center">
                                    <div
                                        class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-4">
                                        <i  id="o10"class="ri-image-add-line ri-2x"></i>
                                    </div>
                                    <p class="text-gray-700 font-medium mb-1">
                                        اسحب وأفلت الصور هنا
                                    </p>
                                    <p class="text-gray-500 text-sm mb-2">
                                        أو انقر لاختيار الصور
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        يمكنك اختيار عدة صور في نفس الوقت
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="image-preview-container"
                            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 hidden">
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=Traditional%2520Palestinian%2520embroidery%2520products%2520displayed%2520on%2520a%2520clean%2520white%2520surface.%2520Colorful%2520hand-embroidered%2520cushions%2C%2520bags%2C%2520and%2520clothing%2520items%2520with%2520intricate%2520traditional%2520patterns%2520arranged%2520neatly.%2520The%2520lighting%2520is%2520bright%2520and%2520natural%2C%2520highlighting%2520the%2520vibrant%2520colors%2520and%2520detailed%2520craftsmanship%2520of%2520the%2520items.&width=200&height=200&seq=1&orientation=squarish"
                                    alt="معاينة الصورة" class="w-full h-24 object-cover rounded" />
                                <button type="button"
                                    class="absolute top-1 left-1 w-6 h-6 flex items-center justify-center bg-white rounded-full shadow-sm text-red-500 hover:bg-red-500 hover:text-white transition">
                                    <i id="o10" class="ri-delete-bin-line"></i>
                                </button>
                                <div
                                    class="absolute bottom-0 right-0 bg-primary text-white text-xs px-2 py-1 rounded-tl">
                                    الغلاف
                                </div>
                            </div>
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=Close-up%2520of%2520detailed%2520Palestinian%2520embroidery%2520work%2520on%2520fabric.%2520The%2520image%2520shows%2520the%2520intricate%2520stitching%2520patterns%2520and%2520vibrant%2520colored%2520threads%2520forming%2520traditional%2520geometric%2520and%2520floral%2520designs.%2520The%2520craftsmanship%2520is%2520highlighted%2520with%2520good%2520lighting%2520on%2520a%2520neutral%2520background.&width=200&height=200&seq=2&orientation=squarish"
                                    alt="معاينة الصورة" class="w-full h-24 object-cover rounded" />
                                <button type="button"
                                    class="absolute top-1 left-1 w-6 h-6 flex items-center justify-center bg-white rounded-full shadow-sm text-red-500 hover:bg-red-500 hover:text-white transition">
                                    <i id="o10" class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=A%2520collection%2520of%2520handmade%2520Palestinian%2520embroidered%2520products%2520including%2520a%2520wallet%2C%2520phone%2520case%2C%2520and%2520small%2520decorative%2520items.%2520The%2520items%2520are%2520arranged%2520on%2520a%2520light-colored%2520surface%2520with%2520soft%2520natural%2520lighting.%2520The%2520embroidery%2520features%2520traditional%2520Palestinian%2520patterns%2520in%2520bright%2C%2520contrasting%2520colors.&width=200&height=200&seq=3&orientation=squarish"
                                    alt="معاينة الصورة" class="w-full h-24 object-cover rounded" />
                                <button type="button"
                                    class="absolute top-1 left-1 w-6 h-6 flex items-center justify-center bg-white rounded-full shadow-sm text-red-500 hover:bg-red-500 hover:text-white transition">
                                    <i id="o10" class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Terms and Conditions -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6 flex items-center">
                            <div class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full ml-2">
                                <i  id="o10" class="ri-file-list-3-line"></i>
                            </div>
                            شروط النشر
                        </h2>
                        <div class="bg-gray-50 rounded-lg p-6 mb-6">
                            <h3 class="font-bold text-lg mb-4">
                                شروط نشر المشروع على منصة بكرة
                            </h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>
                                    يجب أن يكون المشروع قانونياً ومتوافقاً مع القوانين المحلية.
                                </li>
                                <li>
                                    يجب ألا تحتوي المعلومات المقدمة على أي محتوى مسيء أو غير
                                    لائق.
                                </li>
                                <li>
                                    يجب أن تكون الصور المرفقة خاصة بالمشروع وذات جودة مناسبة.
                                </li>
                                <li>يجب أن تكون معلومات التواصل صحيحة وفعالة.</li>
                                <li>
                                    تحتفظ منصة بكرة بحق رفض أي مشروع لا يتوافق مع سياسة المنصة.
                                </li>
                                <li>
                                    سيتم مراجعة المشروع قبل نشره على المنصة خلال 24-48 ساعة.
                                </li>
                                <li>
                                    يتحمل صاحب المشروع مسؤولية صحة المعلومات المقدمة ودقتها.
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-start mb-6">
                            <input type="checkbox" id="terms-agreement" class="custom-checkbox ml-2 mt-1" required />
                            <label for="terms-agreement" class="text-gray-700">
                                أقر بأنني قرأت وأوافق على
                                <a href="#" class="text-primary hover:underline">شروط الاستخدام</a>
                                و<a href="#" class="text-primary hover:underline">سياسة الخصوصية</a>
                                الخاصة بمنصة بكرة.
                            </label>
                        </div>
                        <div class="flex items-start">
                            <input type="checkbox" id="data-agreement" class="custom-checkbox ml-2 mt-1" required />
                            <label for="data-agreement" class="text-gray-700">
                                أقر بأن جميع المعلومات المقدمة صحيحة ودقيقة، وأتحمل المسؤولية
                                الكاملة عنها.
                            </label>
                        </div>
                    </div>
                    <!-- Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-end">
                        <button type="button"
                            class="px-6 py-3 border border-gray-300 !rounded-button whitespace-nowrap hover:bg-gray-50 transition">
                            حفظ كمسودة
                        </button>
                        <button type="submit"
                            id="o9" class="text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">
                            إرسال للمراجعة والنشر
                        </button>
                    </div>
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
