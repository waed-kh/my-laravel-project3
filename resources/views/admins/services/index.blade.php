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
                    <a class="text-white opacity-50" href="javascript:;">Services</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">
                    Services
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                Services
            </h6>
        </nav>
    </x-slot:breadcrumb>
    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparen ">
        <div class="flex-grow">
            <h6 class="dark:text-white">Services table</h6>
        </div>
        <div class="text-center mx-3">
    <a href="{{ route('admin.service.create') }}" class="blue-button">Create</a>
</div>

    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th
                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            name
                        </th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Created At
                        </th>
                        <th
                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td
                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                    {{ $service->name }}
                                </p>
                            </td>

                            <td
                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <span
                                    class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $service->created_at->format('Y/d/m') }}</span>
                            </td>
                            <td
                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <a href="{{ route('admin.service.edit', $service->id) }}"
                                    class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                    <i class="fas fa-edit">Edit</i>
                                </a>

                                <form action="{{ route('admin.service.destroy', $service->id) }}" class="inline"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="text-xs size-16 font-semibold leading-tight dark:text-white dark:opacity-80 text-red-600">
                                        <i class="fas fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                <p
                                    class="text-center mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                    Not Data Found
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layoutDashboard>
