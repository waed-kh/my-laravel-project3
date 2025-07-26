<x-layoutDashboard title="Testimonials">

     <style>
        .link-button {
    margin-left: 0.25rem; /* mx-1 */
    margin-right: 0.25rem;
    border-radius: 0.5rem; /* rounded-lg */
    background-color: #1D4ED8; /* bg-blue-700 */
    padding: 0.5rem 0.75rem; /* py-2 px-3 */
    font-size: 0.75rem; /* text-xs */
    font-weight: 500; /* font-medium */
    color: white; /* text-white */
    text-decoration: none;
    transition: background-color 0.2s;
}

.link-button:hover {
    background-color: #1E40AF; /* hover:bg-blue-800 */
}

.link-button:focus {
    outline: none; /* focus:outline-none */
    box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5); /* focus:ring-4 focus:ring-blue-300 */
}

/* الوضع الداكن */
@media (prefers-color-scheme: dark) {
    .link-button {
        background-color: #2563EB; /* dark:bg-blue-600 */
    }

    .link-button:hover {
        background-color: #1D4ED8; /* dark:hover:bg-blue-700 */
    }

    .link-button:focus {
        box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5); /* dark:focus:ring-blue-800 */
    }
}

        </style>

    <x-slot:breadcrumb>
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">التفييمات</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">
                    التفييمات
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                 التفييمات
            </h6>
        </nav>
    </x-slot:breadcrumb>
    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparen ">
        <div class="flex-grow">
            <h6 class="dark:text-white">  جدول التقييمات</h6>
        </div>
        <div class="text-center mx-3">
            <a href="{{ route('admin.testimonial.create') }}"
               class="link-button"> انشاء</a>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
          <table class="w-full table-auto border-collapse text-slate-500 dark:text-white">
    <thead>
        <tr>
            <th class="px-4 py-2 text-start text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                الاسم
            </th>
            <th class="px-4 py-2 text-start text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                التقييم
            </th>
            <th class="px-4 py-2 text-center text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                تاريخ الإنشاء
            </th>
            <th class="px-4 py-2 text-center text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                الحدث
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($testimonials as $testimonial)
            <tr>
                <td class="px-4 py-2 text-sm border-b dark:border-white/40">
                    {{ $testimonial->user->name }}
                </td>
                <td class="px-4 py-2 text-sm border-b dark:border-white/40">
                    {{ $testimonial->rate }}
                </td>
                <td class="px-4 py-2 text-center text-sm border-b dark:border-white/40 text-slate-400">
                    {{ $testimonial->created_at->format('Y/m/d') }}
                </td>
                <td class="px-4 py-2 text-center border-b dark:border-white/40">
                    <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="text-blue-500 hover:text-blue-700 mx-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="text-red-600 hover:text-red-800 mx-1 delete-button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-4 py-2 text-center text-sm border-b dark:border-white/40">
                    لا يوجد بيانات
                </td>
            </tr>
        @endforelse
    </tbody>
</table>


        </div>
    </div>


      <script>
    document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            if (!confirm("هل أنت متأكد من أنك تريد حذف هذا الموقع")) {
                e.preventDefault(); // يمنع إرسال الفورم إذا ضغط Cancel
            }
            // إذا ضغط OK، الفورم يرسل تلقائياً
        });
    });
});
</script>
</x-layoutDashboard>
