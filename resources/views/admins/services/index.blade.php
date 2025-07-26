<x-layoutDashboard title="Services">
    <style>
        .blue-button {
    border-radius: 0.5rem;
    background-color: #1D4ED8; /* blue-700 */
    padding: 0.5rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 500;
    color: white;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
    margin-left: 0.25rem;
    margin-right: 0.25rem;
}

.blue-button:hover {
    background-color: #1E40AF; /* blue-800 */
}

.blue-button:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5); /* blue-300 */
}

/* الوضع الداكن */
@media (prefers-color-scheme: dark) {
    .blue-button {
        background-color: #2563EB; /* dark:blue-600 */
    }

    .blue-button:hover {
        background-color: #1D4ED8; /* dark:blue-700 */
    }

    .blue-button:focus {
        box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5); /* dark:blue-800 */
    }
}

        </style>
    <x-slot:breadcrumb>
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">الخدمات</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">
                    الخدمات
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                الخدمات
            </h6>
        </nav>
    </x-slot:breadcrumb>
    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparen ">
        <div class="flex-grow">
            <h6 class="dark:text-white"> جدول الخدمات</h6>
        </div>
        <div class="text-center mx-3">
    <a href="{{ route('admin.service.create') }}" class="blue-button"> انشاء</a>
</div>

    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            
           <table class="w-full table-auto border-collapse text-slate-500 dark:text-white">
    <thead>
        <tr class="bg-transparent">
            <th class="px-4 py-3 text-start text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                الاسم
            </th>
            <th class="px-4 py-3 text-center text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                تاريخ الإنشاء
            </th>
            <th class="px-4 py-3 text-center text-xs font-bold uppercase border-b dark:border-white/40 text-slate-400">
                الحدث
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($services as $service)
            <tr>
                {{-- الاسم --}}
                <td class="px-4 py-2 text-sm border-b dark:border-white/40">
                    {{ $service->name }}
                </td>

                {{-- التاريخ --}}
                <td class="px-4 py-2 text-center text-sm border-b dark:border-white/40 text-slate-400">
                    {{ $service->created_at->format('Y/m/d') }}
                </td>

                {{-- الأحداث --}}
                <td class="px-4 py-2 text-center border-b dark:border-white/40">
                    <a href="{{ route('admin.service.edit', $service->id) }}" class="text-blue-500 hover:text-blue-700 mx-1">
                        <i class="fas fa-edit" style="font-size:15px;"></i>
                    </a>
                    <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="text-red-600 hover:text-red-800 mx-1 delete-button">
                            <i class="fas fa-trash" style="font-size:15px;"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="px-4 py-2 text-center text-sm border-b dark:border-white/40">
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
