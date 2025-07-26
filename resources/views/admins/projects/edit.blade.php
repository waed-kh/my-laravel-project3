<x-layoutDashboard title='Projects'>
    <x-slot:breadcrumb>
        <nav>
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;"> لوحة تحكم</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">
                    Projects
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">Edit Project</h6>
        </nav>
    </x-slot:breadcrumb>

    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 rounded-t-2xl">
        <div class="flex-grow">
            <h6 class="dark:text-white">تعديل</h6>
        </div>
        <div class="text-center mx-3">
            <a href="{{ route('admin.project.index') }}" class="blue-button"> جميع المشاريع </a>
        </div>
    </div>

    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">

           
            <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admins.projects._form')
                <div class="mx-3 px-3 my-2 w-100">
                    <button class="create-button"> تعديل</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .blue-button {
            border-radius: 0.5rem;
            background-color: #1D4ED8;
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
        }
        .blue-button:hover {
            background-color: #1E40AF;
        }
        .blue-button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5);
        }
        @media (prefers-color-scheme: dark) {
            .blue-button {
                background-color: #2563EB;
            }
            .blue-button:hover {
                background-color: #1D4ED8;
            }
            .blue-button:focus {
                box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5);
            }
        }

        .create-button {
            margin-left: 0.25rem;
            margin-right: 0.25rem;
            border-radius: 0.5rem;
            background-color: #047857;
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: white;
            border: none;
            outline: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .create-button:hover {
            background-color: #065f46;
        }
        .create-button:focus {
            box-shadow: 0 0 0 4px rgba(134, 239, 172, 0.5);
        }
        @media (prefers-color-scheme: dark) {
            .create-button {
                background-color: #059669;
            }
            .create-button:hover {
                background-color: #047857;
            }
            .create-button:focus {
                box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.5);
            }
        }
    </style>
</x-layoutDashboard>
