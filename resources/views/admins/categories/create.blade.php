<x-layoutDashboard title='Categories'>


    <style>

        .all-categories-button {
    margin-left: 0.25rem; /* mx-1 */
    margin-right: 0.25rem;
    border-radius: 0.5rem; /* rounded-lg */
    background-color: #1D4ED8; /* bg-blue-700 */
    padding: 0.5rem 0.75rem; /* py-2 px-3 */
    font-size: 0.75rem; /* text-xs */
    font-weight: 500; /* font-medium */
    color: white; /* text-white */
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.2s ease;
}

.all-categories-button:hover {
    background-color: #1E40AF; /* hover:bg-blue-800 */
}

.all-categories-button:focus {
    outline: none; /* focus:outline-none */
    box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5); /* focus:ring-4 focus:ring-blue-300 */
}

/* الوضع الداكن */
@media (prefers-color-scheme: dark) {
    .all-categories-button {
        background-color: #2563EB; /* dark:bg-blue-600 */
    }

    .all-categories-button:hover {
        background-color: #1D4ED8; /* dark:hover:bg-blue-700 */
    }

    .all-categories-button:focus {
        box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5); /* dark:focus:ring-blue-800 */
    }
}

        .custom-button {
    margin-left: 0.25rem; /* mx-1 */
    margin-right: 0.25rem;
    border-radius: 0.5rem; /* rounded-lg */
    background-color: #047857; /* bg-green-700 */
    padding: 0.5rem 0.75rem; /* py-2 px-3 */
    font-size: 0.75rem; /* text-xs */
    font-weight: 500; /* font-medium */
    color: white; /* text-white */
    transition: background-color 0.2s;
}

.custom-button:hover {
    background-color: #065f46; /* hover:bg-green-800 */
}

.custom-button:focus {
    outline: none; /* focus:outline-none */
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.5); /* focus:ring-4 focus:ring-green-300 */
}

/* الوضع الداكن */
@media (prefers-color-scheme: dark) {
    .custom-button {
        background-color: #059669; /* dark:bg-green-600 */
    }

    .custom-button:hover {
        background-color: #047857; /* dark:hover:bg-green-700 */
    }

    .custom-button:focus {
        box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.5); /* dark:focus:ring-green-800 */
    }
}

    </style>
    <x-slot:breadcrumb>
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">
                    Categories
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                Create Category
            </h6>
        </nav>
    </x-slot:breadcrumb>

    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparen ">
        <div class="flex-grow">
            <h6 class="dark:text-white">Create Category</h6>
        </div>
        <div class="text-center mx-3">
            <a href="{{ route('admin.category.index') }}"
              class="all-categories-button">All
                Categories</a>
        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admins.categories._form')
                <div class="mx-3 px-3 my-2 w-100">
                    <button class="custom-button" >Create</button>

                </div>
            </form>
        </div>
    </div>
</x-layoutDashboard>
