<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Bukhari+Script&display=swap" rel="stylesheet">
</head>

<body>
    <header class="fixed z-50 w-full bg-white py-2 shadow-lg dark:bg-neutral-900 sm:py-0">
        <nav class="relative mx-auto flex w-full flex-wrap items-center justify-between p-4 sm:flex-nowrap"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="logo">
                    <img class="h-auto w-28 dark:hidden" src="{{ asset('assets/image/logo_light.png') }}"
                        alt="Light Logo">
                    <img class="hidden h-auto w-28 dark:block" src="{{ asset('assets/image/logo_dark.png') }}"
                        alt="Dark Logo">
                </a>
                <button type="button"
                    class="block rounded-lg border border-gray-200 text-gray-800 dark:border-neutral-700 dark:text-white sm:hidden"
                    data-hs-collapse="#navbar-collapse" aria-controls="navbar-collapse" aria-label="Toggle navigation">
                    <svg class="h-4 w-4 hs-collapse-open:hidden" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <svg class="hidden h-4 w-4 hs-collapse-open:block" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </div>
            <div id="navbar-collapse" class="hidden grow basis-full sm:block">
                <div
                    class="flex flex-col space-y-2 py-2 sm:flex-row sm:items-center sm:justify-end sm:space-x-3 sm:space-y-0 sm:py-0">
                    <a class="py-3 font-medium text-gray-500 hover:text-black dark:text-neutral-400 dark:hover:text-neutral-500 sm:px-3"
                        href="#">Home</a>
                    <a class="py-3 font-medium text-gray-500 hover:text-black dark:text-neutral-400 dark:hover:text-neutral-500 sm:px-3"
                        href="#">Category</a>
                    <a class="py-3 font-medium text-gray-500 hover:text-black dark:text-neutral-400 dark:hover:text-neutral-500 sm:px-3"
                        href="#">Product</a>
                    <a class="py-3 font-medium text-gray-500 hover:text-black dark:text-neutral-400 dark:hover:text-neutral-500 sm:px-3"
                        href="#">Contact</a>

                    <div class="hs-dropdown relative py-3 sm:px-3">
                        <button type="button"
                            class="flex w-full items-center font-medium text-gray-500 hover:text-black dark:text-neutral-400 dark:hover:text-neutral-500">
                            Dropdown
                            <svg class="ml-2 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div
                            class="hs-dropdown-menu hidden rounded-lg bg-white shadow-lg dark:bg-neutral-800 sm:mt-2 sm:w-48 sm:duration-150">
                            <a class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                href="#">About</a>
                            <div class="hs-dropdown relative sm:hover:block">
                                <button type="button"
                                    class="flex w-full items-center justify-between rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300">
                                    Sub Menu
                                    <svg class="ml-2 h-4 w-4 sm:rotate-90" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>
                                <div
                                    class="hs-dropdown-menu absolute left-full top-0 ml-2 mt-2 hidden rounded-lg bg-white shadow-lg dark:bg-neutral-800 sm:w-48">
                                    <a class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                        href="#">About</a>
                                    <a class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                        href="#">Downloads</a>
                                    <a class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                        href="#">Team Account</a>
                                </div>
                            </div>
                            <a class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                href="#">Downloads</a>
                            <a class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                href="#">Team Account</a>
                        </div>
                    </div>
                    <a class="flex items-center gap-x-2 py-2 font-semibold text-gray-500 hover:text-black dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 sm:my-6 sm:border-l sm:border-gray-300 sm:py-0 sm:pl-6"
                        href="#">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        Log in
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Content -->
    <div class="w-full">
        <div class="space-y-4 pt-4">
            @yield('content')
        </div>
    </div>
    <!-- End Content -->
</body>

</html>
