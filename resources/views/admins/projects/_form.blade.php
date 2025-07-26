<div class="bg-gray-100 my-1 py-2">
    <h1 class="m-3 px-3 py-2 font-bold text-lg">معلومات المشروع الأساسية</h1>

    <x-form.input name="title" hint="ادخل اسم المشروع" label="اسم المشروع *" :value="old('title', $project->title ?? '')" />

    <x-form.selectObject name="category_id" label="تصنيف المشروع *" hint="اختر تصنيف المشروع" :value="old('category_id', $project->category_id ?? '')" :items="$categories" />

    <x-form.input type="number" name="min_price" min="0" hint="10" label="اقل سعر عرض للمشروع" :value="old('min_price', $project->min_price ?? '')" />

    <x-form.input type="number" name="max_price" min="0" hint="100" label="اعلى سعر عرض للمشروع" :value="old('max_price', $project->max_price ?? '')" />

    <x-form.area name="description" hint="اكتب وصفاً تفصيلياً عن مشروعك، الخدمات التي تقدمها، وما يميزك عن الآخرين."
        label="وصف المشروع *" :value="old('description', $project->description ?? '')" />

    <div class="mb-4">
        @if(!empty($project->image))
            <label class="block mb-1 font-semibold">الصورة الحالية</label>
            <img src="{{ asset('images/projects/' . $project->image) }}" alt="صورة المشروع" style="max-width: 150px; border-radius: 8px;">
        @endif
    </div>

    <!-- حقل اختيار الصورة -->
    <input type="file" name="image" id="cover-image" class="block w-full mt-2 p-2 border rounded" accept="image/*" />

    <!-- معاينة الصورة -->
    <img id="cover-image-preview" src="" alt="معاينة الصورة" class="hidden mt-3 rounded" style="max-width: 150px;" />
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('cover-image');
        const previewImage = document.getElementById('cover-image-preview');

        if (!fileInput || !previewImage) return;

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = "";
                previewImage.classList.add('hidden');
            }
        });
    });
</script>

<!-- باقي عناصر النموذج -->

<div class="bg-gray-100">
    <h5 class="m-3 px-3 py-2 font-bold text-lg">خدمات المشروع</h5>

    @foreach($services as $service)
        <label class="inline-flex items-center mr-3 cursor-pointer">
            <input type="checkbox" name="services[]" value="{{ $service->id }}"
                {{ in_array($service->id, old('services', $projectServices ?? [])) ? 'checked' : '' }}
                class="custom-checkbox" />
            <span class="ml-2 text-gray-700">{{ $service->name }}</span>
        </label>
    @endforeach
</div>

<!-- معلومات التواصل -->
<div class="bg-gray-100 my-1 py-2">
    <h1 class="m-3 px-3 py-2 font-bold text-lg">معلومات التواصل</h1>

    <x-form.input name="phone" hint="059*******" label="رقم الهاتف *" :value="old('phone', $project->contact->phone ?? '')" />

    <x-form.input name="whatsAppNumber" hint="059*******" label="واتساب (اختياري)" :value="old('whatsAppNumber', $project->contact->whatsAppNumber ?? '')" />

    <x-form.input name="email" hint="example@domain.com" label="البريد الإلكتروني *" :value="old('email', $project->contact->email ?? '')" />

    <x-form.input name="facebook_url" hint="رابط صفحة الفيسبوك" label="وسائل التواصل الاجتماعي (اختياري)" :value="old('facebook_url', $project->contact->facebook_url ?? '')" />

    <x-form.input name="instagram_url" hint="رابط صفحة الانستغرام" label="وسائل التواصل الاجتماعي (اختياري)" :value="old('instagram_url', $project->contact->instagram_url ?? '')" />
</div>

<!-- معلومات الموقع وأوقات العمل -->
<div class="bg-gray-100 my-1 py-2">
    <h1 class="m-3 px-3 py-2 font-bold text-lg">الموقع وأوقات العمل</h1>

    <x-form.selectObject
        name="location"
        label="عنوان المشروع *"
        hint="اختر عنوان المشروع"
        :value="old('location', $project->location ?? '')"
        :items="$locations"
    />
@foreach ($workdays as $key => $workday)
    <div class="px-3">
        <div class="flex items-center mb-3">
            <input type="checkbox" name="day[{{ $key }}]" id="{{ $key }}" class="custom-checkbox ml-2"
    {{ (old('day.' . $key) !== null ? old('day.' . $key) : (isset($projectWorkdaysDays) && in_array($key, $projectWorkdaysDays) ? 'checked' : '')) ? 'checked' : '' }}>

            <label for="{{ $key }}" class="text-gray-700 font-medium mx-2">{{ $key }}</label>
        </div>
        <div class="flex flex-wrap gap-2">
            @foreach ($workday as $item)
                @php
                    $time_slot = match($item->time_slot) {
                        'morning' => 'صباحاً',
                        'afternoon' => 'ظهراً',
                        'evening' => 'مساءً',
                        'all_day' => 'طوال اليوم',
                        default => ''
                    };
                @endphp

                <input 
                    type="radio" 
                    id="{{ $item->time_slot }}-{{ $item->id }}"
                    name="workday[{{ $key }}]" 
                    value="{{ $item->id }}" 
                    class="time-slot-checkbox"
                    {{ (old('workday.' . $key) !== null 
                        ? (old('workday.' . $key) == $item->id) 
                        : (isset($projectWorkdays) && in_array($item->id, $projectWorkdays) ? 'checked' : '')
                    ) ? 'checked' : '' }}
                >
                <label for="{{ $item->time_slot }}-{{ $item->id }}"
                    class="px-3 py-1 border border-gray-200 rounded text-sm cursor-pointer">
                    {{ $time_slot }}
                    @if ($item->time_slot != 'all_day')
                        ({{ $item->from_time->format('h:i A') }} - {{ $item->to_time->format('h:i A') }})
                    @endif
                </label>
            @endforeach
        </div>
    </div>
@endforeach

</div>
@push('css')
    <style>
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
                url("https://readdy.ai/api/search-image?query=Workspace%2520with%2520creative%2520tools%2520and%2520project%2520materials%2520neatly%2520arranged%2520on%2520a%2520clean%2520desk.%2520Natural%2520light%2520streaming%2520in%2520from%2520a%2520window%2520illuminates%2520the%2520scene.%2520A%2520notebook%2520with%2520Arabic%2520writing%2520and%2520project%2520sketches%2520is%2520open%2520alongside%2520a%2520modern%2520laptop.%2520The%2520atmosphere%2520conveys%2520productivity%2520and%2520organization%2520with%2520Middle%2520Eastern%2520design%2520elements%2520and%2520soft%2520colors.&width=1200&height=400&seq=1&orientation=landscape");
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

    </style>
     

@endpush 