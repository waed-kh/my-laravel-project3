<x-layoutDashboard title='Locations'>
    <style>
        .btn-create {
    margin-left: 0.25rem;
    margin-right: 0.25rem;
    border-radius: 0.5rem;
    background-color: #047857; /* green-700 */
    padding: 0.5rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 500;
    color: #ffffff;
    border: none;
    outline: none;
    cursor: pointer;
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
}

.btn-create:hover {
    background-color: #065f46; /* green-800 */
}

.btn-create:focus {
    box-shadow: 0 0 0 4px rgba(134, 239, 172, 0.5); /* green-300 ring */
}

/* الوضع الداكن */
@media (prefers-color-scheme: dark) {
    .btn-create {
        background-color: #059669; /* green-600 */
    }

    .btn-create:hover {
        background-color: #047857; /* green-700 */
    }

    .btn-create:focus {
        box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.5); /* green-800 ring */
    }
}

.all-locations-btn {
  margin-left: 0.25rem;  /* mx-1 */
  margin-right: 0.25rem;
  border-radius: 0.5rem; /* rounded-lg */
  background-color: #1D4ED8; /* bg-blue-700 */
  padding: 0.5rem 0.75rem; /* py-2 px-3 */
  font-size: 0.75rem; /* text-xs */
  font-weight: 500; /* font-medium */
  color: white;
  text-decoration: none;
  display: inline-block;
  transition: background-color 0.2s ease, box-shadow 0.2s ease;
}

.all-locations-btn:hover {
  background-color: #1E40AF; /* hover:bg-blue-800 */
}

.all-locations-btn:focus {
  outline: none;
  box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5); /* focus:ring-blue-300 */
}

@media (prefers-color-scheme: dark) {
  .all-locations-btn {
    background-color: #2563EB; /* dark:bg-blue-600 */
  }
  .all-locations-btn:hover {
    background-color: #1D4ED8; /* dark:hover:bg-blue-700 */
  }
  .all-locations-btn:focus {
    box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5); /* dark:focus:ring-blue-800 */
  }
}


.all-locations-btn {
    margin: 0; /* لأننا نتحكم بالمسافات بالـ flex gap */
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

.all-locations-btn:hover {
    background-color: #1E40AF;
}

.all-locations-btn:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.5);
}

.create-btn {
    margin: 0;
    border-radius: 0.5rem;
    background-color:  #1E40AF;
    padding: 0.5rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 500;
    color: white;
    border: none;
    outline: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
}

.create-btn:hover {
    background-color:#2563EB;
}

.create-btn:focus {
    box-shadow: 0 0 0 4px #2563EB;
}

/* الوضع الداكن */
@media (prefers-color-scheme: dark) {
    .all-locations-btn {
        background-color: #2563EB;
    }
    .all-locations-btn:hover {
        background-color: #1D4ED8;
    }
    .all-locations-btn:focus {
        box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.5);
    }
    .create-btn {
        background-color: #2563EB;
    }
    .create-btn:hover {
        background-color:  #2563EB;
    }
    .create-btn:focus {
        box-shadow: 0 0 0 4px #2563EB;
    }
}


        </style>
    <x-slot:breadcrumb>
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;"> لوحة التحكم</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">
                     المواقع
                </li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">
                انشاء الموقع
            </h6>
        </nav>
    </x-slot:breadcrumb>

    <div class="flex justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparen ">
        <div class="flex-grow">
            <h6 class="dark:text-white">  انشاء الموقع</h6>
        </div>
        <div class="text-center mx-3">
            <a href="{{ route('admin.location.index') }}" class="all-locations-btn"> جميع المواقع</a>

        </div>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <form action="{{ route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admins.locations._form')
                <div class="mx-3 px-3 my-2 w-100">
                    <button class="btn-create"> انشاء</button>

                </div>

            </form>
        </div>
    </div>
</x-layoutDashboard>
