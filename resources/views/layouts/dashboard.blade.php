<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.png') }}" type="image/x-icon">
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    {{-- End Font --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- CropperJS CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css"
        integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Dark Light Selector
        document.getElementById("theme-toggle").addEventListener("click", function() {
            const html = document.querySelector("html");
            const currentTheme = localStorage.getItem("hs_theme") || "auto";
            let newTheme;

            if (currentTheme === "light") {
                newTheme = "dark";
            } else if (currentTheme === "dark") {
                newTheme = "light";
            } else {
                newTheme = html.classList.contains("dark") ? "light" : "dark";
            }

            localStorage.setItem("hs_theme", newTheme);
            if (newTheme === "light") {
                html.classList.remove("dark");
                html.classList.add("light");
            } else {
                html.classList.remove("light");
                html.classList.add("dark");
            }
        });
    </script>
</head>

<body class="light dark:bg-black dark:text-white">
    <!-- ========== HEADER ========== -->
    <header
        class="sticky inset-x-0 top-0 z-[48] flex w-full flex-wrap border-b bg-white py-2.5 text-sm dark:border-neutral-700 dark:bg-neutral-800 sm:flex-nowrap sm:justify-start sm:py-4 lg:ps-64">
        <nav class="mx-auto flex w-full basis-full items-center px-4 sm:px-6" aria-label="Global">
            <div class="me-5 lg:me-0 lg:hidden">
                <!-- Logo -->
                <a href="{{ route('dashboard.index') }}"
                    class="inline-block flex-none rounded-xl text-xl font-semibold focus:opacity-80 focus:outline-none"
                    aria-label="Preline">
                    <img class="h-auto w-28 dark:hidden" src="{{ asset('assets/image/logo_light.png') }}"
                        alt="">
                    <img class="hidden h-auto w-28 dark:block" src="{{ asset('assets/image/logo_dark.png') }}"
                        alt="">
                </a>
                <!-- End Logo -->
            </div>

            <div class="ms-auto flex w-full items-center justify-end sm:order-3 sm:justify-between sm:gap-x-3">
                <div class="sm:hidden">
                    <button type="button"
                        class="inline-flex h-[2.375rem] w-[2.375rem] items-center justify-center gap-x-2 rounded-full border border-transparent text-sm font-semibold text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:text-white dark:hover:bg-neutral-700">
                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </button>
                </div>

                <div class="hidden sm:block">
                    <label for="icon" class="sr-only">Search</label>
                    <div class="min-w-72 md:min-w-80 relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 z-20 flex items-center ps-4">
                            <svg class="size-4 flex-shrink-0 text-gray-400 dark:text-neutral-400"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <input type="text" id="icon" name="icon"
                            class="block w-full rounded-lg border-gray-200 px-4 py-2 ps-11 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Search">
                    </div>
                </div>

                <div class="flex flex-row items-center justify-end gap-2">
                    <button type="button"
                        class="inline-flex h-[2.375rem] w-[2.375rem] items-center justify-center gap-x-2 rounded-full border border-transparent text-sm font-semibold text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:text-white dark:hover:bg-neutral-700">
                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                        </svg>
                    </button>
                    <div class="hs-dropdown">
                        <button type="button"
                            class="hs-dropdown-toggle hs-dark-mode group me-2 flex items-center font-medium text-gray-600 hover:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-500">
                            <svg class="size-4 block hs-dark-mode-active:hidden" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                            </svg>
                            <svg class="size-4 hidden hs-dark-mode-active:block" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                        </button>

                        <div id="selectThemeDropdown"
                            class="hs-dropdown-menu z-10 mb-2 mt-2 hidden origin-bottom-left space-y-1 rounded-lg bg-white p-2 opacity-0 shadow-md transition-[margin,opacity] duration-300 hs-dropdown-open:opacity-100 dark:divide-neutral-700 dark:border dark:border-neutral-700 dark:bg-neutral-800">
                            <button type="button"
                                class="flex w-full items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                data-hs-theme-click-value="default">
                                Default (Light)
                            </button>
                            <button type="button"
                                class="flex w-full items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                data-hs-theme-click-value="dark">
                                Dark
                            </button>
                            <button type="button"
                                class="flex w-full items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                data-hs-theme-click-value="auto">
                                Auto (System)
                            </button>
                        </div>
                    </div>
                    {{-- <button type="button"
                        class="inline-flex h-[2.375rem] w-[2.375rem] items-center justify-center gap-x-2 rounded-full border border-transparent text-sm font-semibold text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:text-white dark:hover:bg-neutral-700"
                        data-hs-offcanvas="#hs-offcanvas-right">

                    </button> --}}

                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                        <button id="hs-dropdown-with-header" type="button"
                            class="inline-flex h-[2.375rem] w-[2.375rem] items-center justify-center gap-x-2 rounded-full border border-transparent text-sm font-semibold text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:text-white dark:hover:bg-neutral-700">
                            <img class="size-[38px] inline-block rounded-full ring-2 ring-white dark:ring-neutral-800"
                                src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                alt="Image Description">
                        </button>

                        <div class="hs-dropdown-menu duration min-w-60 hidden rounded-lg bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:border dark:border-neutral-700 dark:bg-neutral-900"
                            aria-labelledby="hs-dropdown-with-header">
                            <div class="-m-2 rounded-t-lg bg-gray-100 px-5 py-3 dark:bg-neutral-800">
                                <p class="text-sm text-gray-500 dark:text-neutral-400">Masuk sebagai</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-neutral-300">
                                    {{ auth()->user()->email }}</p>
                            </div>
                            <div class="mt-2 py-2 first:pt-0 last:pb-0">
                                <a class="flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                    href="#">
                                    <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                                    </svg>
                                    Pemberitahuan
                                </a>
                                <a class="flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                    href="#">
                                    {{-- href="{{ route('profile') }}"> --}}
                                    <svg class="size-4 flex-shrink-0" width="24" height="24"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    Pengaturan Profil
                                </a>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300">
                                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                        </svg>
                                        Keluar
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Breadcrumb -->
    <div
        class="sticky inset-x-0 top-0 z-20 border-y bg-white px-4 dark:border-neutral-700 dark:bg-neutral-800 sm:px-6 md:px-8 lg:hidden">
        <div class="flex items-center justify-between py-2">
            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap">
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    Application Layout
                    <svg class="size-2.5 mx-3 flex-shrink-0 overflow-visible text-gray-400 dark:text-neutral-500"
                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="truncate text-sm font-semibold text-gray-800 dark:text-neutral-400" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->

            <!-- Sidebar -->
            <button type="button"
                class="flex items-center justify-center gap-x-1.5 rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-500 hover:text-gray-600 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200"
                data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Sidebar">
                <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
                </svg>
                <span class="sr-only">Sidebar</span>
            </button>
            <!-- End Sidebar -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div id="application-sidebar"
        class="hs-overlay fixed inset-y-0 start-0 z-[60] hidden w-[260px] -translate-x-full transform border-e border-gray-200 bg-white transition-all duration-300 [--auto-close:lg] hs-overlay-open:translate-x-0 dark:border-neutral-700 dark:bg-neutral-800 lg:bottom-0 lg:end-auto lg:block lg:translate-x-0">
        <div class="px-8 pt-4">
            <!-- Logo -->
            <a href="{{ route('dashboard.index') }}"
                class="inline-block flex-none rounded-xl text-xl font-semibold focus:opacity-80 focus:outline-none"
                aria-label="Preline">
                <img class="h-auto w-28 dark:hidden" src="{{ asset('assets/image/logo_light.png') }}" alt="">
                <img class="hidden h-auto w-28 dark:block" src="{{ asset('assets/image/logo_dark.png') }}"
                    alt="">
            </a>
            <!-- End Logo -->
        </div>

        <nav class="hs-accordion-group flex w-full flex-col flex-wrap p-6" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <a class="{{ request()->routeIs('dashboard.index') ? 'flex items-center gap-x-3.5 rounded-lg bg-gray-100 px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-700 dark:text-white' : 'flex items-center gap-x-3.5 rounded-lg  px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:text-neutral-400' }}"
                        href="{{ route('dashboard.index') }}">
                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li class="hs-accordion" id="projects-accordion">
                    <button type="button"
                        class="{{ request()->routeIs(['product.index', 'product.create', 'category.index']) ? 'hs-accordion-toggle bg-gray-100 dark:bg-neutral-700 text-blue-600 hover:bg-gray-100 dark:text-white flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-start text-sm ' : 'hs-accordion-toggle hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent dark:hs-accordion-active:text-white flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-start text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300' }}">
                        <svg class="size-4 flex-shrink-0" width="24" height="24"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                        Produk
                        <svg class="size-4 ms-auto hidden hs-accordion-active:block"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg class="size-4 ms-auto block hs-accordion-active:hidden"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="projects-accordion-child"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                        <ul class="ps-2 pt-2">
                            <li>
                                <a class="{{ request()->routeIs('category.*') ? 'flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 bg-gray-100 hover:bg-gray-100 dark:bg-neutral-700 dark:text-neutral-300 dark:hover:text-neutral-300' : 'flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300' }}"
                                    href="{{ route('category.index') }}">
                                    Kategori Produk
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('product.create') ? 'flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 bg-gray-100 hover:bg-gray-100 dark:bg-neutral-700 dark:text-neutral-300 dark:hover:text-neutral-300' : 'flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300' }}"
                                    href="{{ route('product.create') }}">
                                    Tambah Produk
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('product.index') ? 'flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 bg-gray-100 hover:bg-gray-100 dark:bg-neutral-700 dark:text-neutral-300 dark:hover:text-neutral-300' : 'flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300' }}"
                                    href="{{ route('product.index') }}">
                                    Daftar Produk
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="hs-accordion" id="users-accordion">
                    <button type="button"
                        class="hs-accordion-toggle flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-start text-sm text-neutral-700 hover:bg-gray-100 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Users

                        <svg class="size-4 ms-auto hidden hs-accordion-active:block"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg class="size-4 ms-auto block hs-accordion-active:hidden"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="users-accordion-child"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                        <ul class="hs-accordion-group ps-3 pt-2" data-hs-accordion-always-open>
                            <li class="hs-accordion" id="users-accordion-sub-1">
                                <button type="button"
                                    class="hs-accordion-toggle flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-start text-sm text-neutral-700 hover:bg-gray-100 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
                                    Sub Menu 1

                                    <svg class="size-4 ms-auto hidden hs-accordion-active:block"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg class="size-4 ms-auto block hs-accordion-active:hidden"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div id="users-accordion-sub-1-child"
                                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                                    <ul class="ps-2 pt-2">
                                        <li>
                                            <a class="flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                                href="#">
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                                href="#">
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                                href="#">
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="hs-accordion" id="users-accordion-sub-2">
                                <button type="button"
                                    class="hs-accordion-toggle flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-start text-sm text-neutral-700 hover:bg-gray-100 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
                                    Sub Menu 2

                                    <svg class="size-4 ms-auto hidden hs-accordion-active:block"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m18 15-6-6-6 6" />
                                    </svg>

                                    <svg class="size-4 ms-auto block hs-accordion-active:hidden"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div id="users-accordion-sub-2-child"
                                    class="hs-accordion-content hidden w-full overflow-hidden ps-2 transition-[height] duration-300">
                                    <ul class="ps-2 pt-2">
                                        <li>
                                            <a class="flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                                href="#">
                                                Link 1
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                                href="#">
                                                Link 2
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                                href="#">
                                                Link 3
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li><a class="flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                        href="#">
                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" x2="16" y1="2" y2="6" />
                            <line x1="8" x2="8" y1="2" y2="6" />
                            <line x1="3" x2="21" y1="10" y2="10" />
                            <path d="M8 14h.01" />
                            <path d="M12 14h.01" />
                            <path d="M16 14h.01" />
                            <path d="M8 18h.01" />
                            <path d="M12 18h.01" />
                            <path d="M16 18h.01" />
                        </svg>
                        Calendar
                    </a></li>
                <li><a class="flex w-full items-center gap-x-3.5 rounded-lg px-2.5 py-2 text-sm text-neutral-700 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-900 dark:hover:text-neutral-300"
                        href="#">
                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                        Documentation
                    </a></li>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="space-y-4 p-4 sm:space-y-6 sm:p-6">
            @yield('content')
        </div>
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
</body>

</html>
