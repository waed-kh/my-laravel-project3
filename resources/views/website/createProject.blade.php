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

        .create-button {
    background-color: #d3d3d3; /* رمادي فاتح */
    color: #333; /* نص داكن */
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  
  .create-button:hover {
    background-color: #b0b0b0; /* رمادي أغمق شوي */
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

            {{-- رسالة نجاح --}}
            @if(session('success'))
                <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
@if (session('image_success'))
    <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('image_success') }}
    </div>
@endif

            






             

            <form action="{{ route('projectStore') }}" method="POST" id="add-project-form" enctype="multipart/form-data">
                @csrf

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
                            <label for="project-name" class="block text-gray-700 mb-2">اسم المشروع <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="project-name" value="{{ old('title') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800
                                    @error('title') border-red-500 @enderror"
                                placeholder="أدخل اسم المشروع"  />
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="project-category" class="block text-gray-700 mb-2">تصنيف المشروع <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="project-category" name="category_id"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 appearance-none pr-8
                                    @error('category_id') border-red-500 @enderror"
                                    >
                                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                        اختر تصنيف المشروع
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-500"></i>
                                </div>
                            </div>
                            @error('category_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="min_price" class="block text-gray-700 mb-2">اقل سعر للمشروع <span class="text-red-500">*</span></label>
                            <input type="number" min="0" name="min_price" id="min_price" value="{{ old('min_price') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800
                                @error('min_price') border-red-500 @enderror"
                                placeholder="اقل سعر للمشورع"  />
                            @error('min_price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="max_price" class="block text-gray-700 mb-2">اعلى سعر للمشروع <span class="text-red-500">*</span></label>
                            <input type="number" min="0" name="max_price" id="max_price" value="{{ old('max_price') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800
                                @error('max_price') border-red-500 @enderror"
                                placeholder="اعلى سعر للمشروع"  />
                            @error('max_price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="pricing_type" class="block text-gray-700 mb-2">طريقة الدفع <span class="text-red-500">*</span></label>
                            <select id="pricing_type" name="pricing_type"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 appearance-none pr-8
                                @error('pricing_type') border-red-500 @enderror"
                                >
                                <option value="" disabled {{ old('pricing_type') ? '' : 'selected' }}>
                                    اختر طريقة الدفع
                                </option>
                                <option value="fixed" {{ old('pricing_type') == 'fixed' ? 'selected' : '' }}>ثابت</option>
                                <option value="hourly" {{ old('pricing_type') == 'hourly' ? 'selected' : '' }}>ساعة</option>
                            </select>
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                <i class="ri-arrow-down-s-line text-gray-500"></i>
                            </div>
                            @error('pricing_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="project-description" class="block text-gray-700 mb-2">وصف المشروع <span class="text-red-500">*</span></label>
                        <textarea name="description" id="project-description" rows="5"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 resize-none
                            @error('description') border-red-500 @enderror"
                            placeholder="اكتب وصفاً تفصيلياً عن مشروعك، الخدمات التي تقدمها، وما يميزك عن الآخرين...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="text-xs text-gray-500 mt-1">
                            الحد الأدنى 100 حرف، الحد الأقصى 500 حرف
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">خدمات المشروع</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach ($services as $service)
                                <div class="flex items-center">
                                    <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                        id="service-{{ $service->id }}" class="custom-checkbox ml-2"
                                        {{ (is_array(old('services')) && in_array($service->id, old('services'))) ? 'checked' : '' }} />
                                    <label for="service-{{ $service->id }}" class="text-gray-700">{{ $service->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('services')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
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
                            <label for="contact-phone" class="block text-gray-700 mb-2">رقم الهاتف <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                    <i class="ri-phone-line"></i>
                                </div>
                                <input type="tel" name="phone" id="contact-phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12
                                    @error('phone') border-red-500 @enderror"
                                    placeholder="059xxxxxxx"  />
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact-whatsapp" class="block text-gray-700 mb-2">واتساب (اختياري)</label>
                            <div class="relative">
                                <div class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                    <i class="ri-whatsapp-line"></i>
                                </div>
                                <input type="tel" name="whatsAppNumber" id="contact-whatsapp" value="{{ old('whatsAppNumber') }}"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                    placeholder="059xxxxxxx" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="contact-email" class="block text-gray-700 mb-2">البريد الإلكتروني <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                <i class="ri-mail-line"></i>
                            </div>
                            <input type="email" name="email" id="contact-email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12
                                @error('email') border-red-500 @enderror"
                                placeholder="example@domain.com"  />
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">وسائل التواصل الاجتماعي (اختياري)</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative">
                                <div class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                                <input type="text" name="facebook_url" value="{{ old('facebook_url') }}"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12"
                                    placeholder="رابط صفحة الفيسبوك" />
                            </div>
                            <div class="relative">
                                <div class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
                                    <i class="ri-instagram-line"></i>
                                </div>
                                <input type="text" name="instagram_url" value="{{ old('instagram_url') }}"
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
    <label for="location" class="block text-gray-700 mb-2">
        الموقع <span class="text-red-500">*</span>
    </label>
    <div class="relative">
        <div class="absolute right-0 top-0 h-full flex items-center justify-center w-12 text-gray-500 border-l border-gray-200">
            <i class="ri-map-pin-line"></i>
        </div>
        <select name="location" id="location"
            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-gray-800 pr-12 appearance-none @error('location') border-red-500 @enderror">
            <option value="">اختر الموقع</option>
            @foreach ($locations as $loc)
                <option value="{{ $loc->name }}" {{ old('location') == $loc->name ? 'selected' : '' }}>
                    {{ $loc->name }}
                </option>
            @endforeach
        </select>
    </div>
    @error('location')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
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
                        @error('days')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('times')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>















                    <div class="mb-6">
    <label class="block text-gray-700 mb-2">صورة الغلاف الرئيسية
        <span class="text-red-500">*</span></label>
    <div
        id="dropzone-cover-image"
        class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition cursor-pointer relative flex flex-col items-center justify-center"
        style="min-height: 180px;"
    >
        <input type="file" name="image" id="cover-image" accept="image/*"
            class="custom-file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer" />

        <div id="cover-image-placeholder" class="flex flex-col items-center justify-center">
            <div
                class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-4">
                <i class="ri-upload-cloud-line ri-2x"></i>
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

        <img id="cover-image-preview" class="hidden max-h-40 rounded object-contain" alt="معاينة صورة الغلاف" />
    </div>

    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
                </div>

                <!-- Images -->
    

<script>
    const coverImageInput = document.getElementById('cover-image');
    const coverImagePreview = document.getElementById('cover-image-preview');
    const coverImagePlaceholder = document.getElementById('cover-image-placeholder');

    coverImageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                coverImagePreview.src = this.result;
                coverImagePreview.classList.remove('hidden');
                coverImagePlaceholder.classList.add('hidden');
            });

            reader.readAsDataURL(file);
        } else {
            coverImagePreview.src = "";
            coverImagePreview.classList.add('hidden');
            coverImagePlaceholder.classList.remove('hidden');
        }
    });
</script>

    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    <img id="cover-image-preview" class="hidden mt-4 w-40 h-40 object-cover rounded" alt="معاينة صورة الغلاف" />


  <div class="flex flex-col sm:flex-row gap-4 justify-end">
                <button type="submit" name="preview_draft" value="1"
    class="bg-gray-300 text-gray-700 px-6 py-3 rounded whitespace-nowrap hover:bg-gray-400 transition">
    حفظ كمسودة
</button>







           
                   <button    id="o9" class="text-white px-6 py-3 !rounded-button whitespace-nowrap hover:bg-primary/90 transition" type="submit">إرسال للمراجعة</button>

                    </div>

    
</div>


                    
                   
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


    // عرض معاينة صورة الغلاف عند التغيير
    document.getElementById('cover-image').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('cover-image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    });

        </script>
    @endpush

</x-layoutWebSite>
