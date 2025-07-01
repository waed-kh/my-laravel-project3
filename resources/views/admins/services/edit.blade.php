<x-layoutDashboard title='Services'>
    <x-slot:breadcrumb>
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">
                    Services
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                Edit Service
            </h6>
        </nav>
    </x-slot:breadcrumb>

    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparen ">
        <div class="flex-grow">
            <h6 class="dark:text-white">Edit Service</h6>
        </div>
        <div class="text-center mx-3">
            <a href="{{ route('admin.service.index') }}"
                class="mx-1 rounded-lg bg-blue-700 px-3 py-2 text-xs font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">All
                Services</a>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <form action="{{ route('admin.service.update', $service->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admins.services._form')
                <div class="mx-3 px-3 my-2 w-100">
                    <button
                        class="mx-1 rounded-lg bg-green-700 px-3 py-2 text-xs font-medium text-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 focus:outline-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                </div>

            </form>
        </div>
    </div>
</x-layoutDashboard>
