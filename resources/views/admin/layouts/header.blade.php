<nav class="fixed top-0 z-50 w-full bg-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/" class="flex ml-2 md:mr-24">
                    <img src="{{ asset('assets/logo.svg') }}" class="h-6 mr-3" alt="NaZMalogy Logo" />
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button" class="flex rounded-full" aria-expanded="false"
                            data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-10 h-10 rounded-full object-cover"
                                src="{{ auth()->user()->avatar ? asset('storage/avatar/' . auth()->user()->avatar) : asset('assets/noimage.svg') }}"
                                alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-xs 2xl:text-tiny text-gray-900 dark:text-white" role="none " >
                                {{ auth()->user()->fullname }}
                            </p>
                            <p class="text-xs 2xl:text-tiny font-bold text-gray-900 truncate dark:text-gray-300"
                                role="none">
                                {{ auth()->user()->role }}
                            </p>
                            @if (auth()->user()->role != 'admin')
                            <p class="text-xs 2xl:text-tiny font-bold flex items-center text-gray-900 truncate dark:text-gray-300"
                            role="none">
                            <ion-icon name="ribbon" class="w-4 h-4 mr-2 text-gray-400"></ion-icon> {{ auth()->user()->points->sum('amount') }} 
                            </p> 
                            @endif
                        </div>
                        <ul class="py-1 text-xs 2xl:text-sm sidebar" role="none">
                            <li>
                                <a href="{{ 
                                    auth()->user()->role == 'admin' ? route('admin.dashboard.index') : 
                                    (auth()->user()->role == 'facilitator' ? route('facilitator.index') : 
                                    route('user.dashboard.index')) }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300"
                                        role="menuitem">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
