<x-layoutDashboard title="Projects">

    
    <x-slot:breadcrumb>
        <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Projects</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">
                    المشاريع
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize"> المشاريع</h6>
        </nav>
    </x-slot:breadcrumb>

    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 rounded-t-2xl">
        <div class="flex-grow">
            <h6 class="dark:text-white"> جدول المشاريع </h6>
        </div>
        <div class="text-center mx-3">
            <a href="{{ route('admin.project.create') }}" class="link-button"> انشاء</a>
        </div>
    </div>

    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">

            

         <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
    <thead class="align-bottom">
        <tr>
            <th class="px-6 py-3 font-bold text-center uppercase bg-transparent border-b text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">الصورة</th>
            <th class="px-6 py-3 pl-2 font-bold text-center uppercase bg-transparent border-b text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">الاسم</th>
            <th class="px-6 py-3 font-bold text-center uppercase bg-transparent border-b text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">تاريخ الانشاء</th>
            <th class="px-6 py-3 font-semibold text-center capitalize bg-transparent border-b text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">الحدث</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
            <tr>
                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    @if($project->image)
                        <img src="{{ asset('images/projects/' . $project->image) }}" width="100" height="100" class="rounded-xl" alt="{{ $project->title }}" />
                    @endif
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                        {{ $project->title }}
                    </p>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                        {{ $project->created_at->format('Y/m/d') }}
                    </span>
                </td>
                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <a href="{{ route('admin.project.edit', $project->id) }}" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 mr-2" title="تعديل">
                        <i class="fas fa-edit" style="font-size:15px;"></i>
                    </a>

                    <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="text-red-600 hover:text-red-800 mx-1 delete-button">
                            <i class="fas fa-trash" style="font-size:15px;"></i>
                        </button>
                    </form>

                    @if(!$project->is_approved)
                        <form action="{{ route('admin.project.approve', $project->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" title="قبول المشروع"  class="text-green-600 hover:text-white hover:bg-green-600 transition">
                        <i class="fas fa-check" style="color: green; font-size: 12px; width: 18px; height: 18px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid green; border-radius: 3px;"></i>


                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.project.disapprove', $project->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" title="إلغاء قبول المشروع"  class="text-red-600 hover:text-white hover:bg-red-600 transition rounded p-2">
                        <i class="fas fa-times" style="color: red; font-size: 12px; width: 18px; height: 18px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid red; border-radius: 3px;"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="text-center mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                        لا توجد بيانات
                    </p>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

            <div class="mt-4">
                {{ $projects->links() }}
            </div>
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

<style>
    .link-button {
        margin: 0 0.25rem;
        border-radius: 0.5rem;
        background-color: #1D4ED8;
        padding: 0.5rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 500;
        color: white;
        text-decoration: none;
        transition: background-color 0.2s;
    }
    .link-button:hover {
        background-color: #1E40AF;
    }
    .link-button:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5);
    }
    @media (prefers-color-scheme: dark) {
        .link-button {
            background-color: #2563EB;
        }
        .link-button:hover {
            background-color: #1D4ED8;
        }
        .link-button:focus {
            box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5);
        }
    }

    
   


       
</style>
  