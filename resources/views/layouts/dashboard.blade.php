<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">

    @include('partials.preloader')

    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            @include('partials.header')

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
