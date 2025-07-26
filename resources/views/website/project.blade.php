<x-layoutWebSite>
    @section('title', $project->title)

    <div class="container mx-auto py-10 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- صورة الغلاف --}}
            <div>
                @if ($project->img_path )
                            <img src="{{ $project->img_path }}" alt="{{ $project->title }}"
                         class="w-full h-64 object-cover rounded-xl">
                @else
                    <img src="https://via.placeholder.com/600x300" alt="No Image"
                         class="w-full h-64 object-cover rounded-xl">
                @endif
            </div>








     

            {{-- تفاصيل المشروع --}}
            <div class="flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $project->title }}</h1>

                    <p class="text-gray-500 mb-4"><i class="fa fa-map-marker-alt"></i> الموقع:
                        {{ $project->location }}</p>

                    <div class="mb-4 flex flex-wrap gap-2">
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">الحالة: {{ $project->status }}</span>
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">نوع التسعير: {{ $project->pricing_type }}</span>
                    </div>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ $project->description }}
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700">
                        <p><strong>الحد الأدنى للسعر:</strong> {{ number_format($project->min_price, 2) }}$</p>
                        <p><strong>الحد الأعلى للسعر:</strong> {{ number_format($project->max_price, 2) }}$</p>
                        <p><strong>التصنيف:</strong> {{ optional($project->category)->name }}</p>
                        <p><strong>صاحب المشروع:</strong> {{ optional($project->user)->name }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{route('homePage')}}" class="bg-[#4f7cac] hover:bg-[#3e6896] text-white px-6 py-3 rounded-xl shadow text-center block">  تم مشاهدة جميع التفاصيل</a>
                </div>
            </div>
        </div>

        {{-- صور المعرض --}}
        @if ($project->gallery && $project->gallery->count())
            <div class="mt-10">
                <h2 class="text-2xl font-bold mb-4">معرض الصور</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach ($project->gallery as $gallery)
                        <img src="{{ asset('uploads/projects/' . $gallery->image) }}"
                             class="rounded-xl object-cover h-40 w-full" alt="صورة إضافية">
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layoutWebSite>  