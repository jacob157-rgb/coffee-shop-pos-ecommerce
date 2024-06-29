@extends('layouts.dashboard')

@section('content')
    <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="inline-block min-w-full p-1.5 align-middle">
                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                        <!-- Header -->
                        <div
                            class="grid gap-3 border-b border-gray-200 px-6 py-4 dark:border-neutral-700 md:flex md:items-center md:justify-between">
                            <!-- Input -->
                            <div class="sm:col-span-1">
                                <label for="searchInput" class="sr-only">Search</label>
                                <div class="relative">
                                    <input type="text" id="searchInput" name="name"
                                        class="block w-full rounded-lg border border-gray-200 px-3 py-2 ps-11 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Search">
                                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                                        <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->

                            <div class="sm:col-span-2 md:grow">
                                <div class="flex justify-end gap-x-2">
                                    <div class="relative inline-block [--placement:bottom-right]">
                                        <a href=""
                                            class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            <svg class="size-5 flex-shrink-0" width="16" height="16"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table id="dataTable" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                No.
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center justify-start">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Nama Kategori
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center justify-end">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Aksi
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @if ($categories->isEmpty())
                                    <td colspan="3" class="whitespace-nowrap px-6 py-2 text-center">
                                        <span class="text-sm text-gray-600 dark:text-neutral-400">Data kategori kosong,
                                            silahkan tambahkan kategori.</span>
                                    </td>
                                @else
                                    @foreach ($categories as $index => $row)
                                        <tr>
                                            <td class="whitespace-nowrap px-6 py-2">
                                                <div>
                                                    <p class="text-smdecoration-2 hover:underline">
                                                        {{ $index + 1 }}.</p>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-2 text-center">
                                                <div class="flex items-center justify-start">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $row->name }}</span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-2">
                                                <div class="flex justify-end">
                                                    <div
                                                        class="group inline-flex items-center divide-x divide-gray-300 rounded-lg border border-gray-300 bg-white shadow-sm transition-all dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-700">
                                                        <div class="hs-tooltip inline-block">
                                                            <a href="{{ route('category.edit', $row->id) }}"
                                                                class="hs-tooltip-toggle inline-flex items-center justify-center gap-x-2 rounded-s-md bg-white px-2 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800"
                                                                href="#">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="blue" class="size-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                                <span
                                                                    class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible invisible absolute z-10 inline-block rounded bg-gray-900 px-2 py-1 text-xs font-medium text-white opacity-0 shadow-sm transition-opacity dark:bg-neutral-700"
                                                                    role="tooltip">
                                                                    Edit
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="hs-tooltip inline-block">
                                                            <form method="POST"
                                                                action="{{ route('category.destroy', $row->id) }}"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="hs-tooltip-toggle inline-flex items-center justify-center gap-x-2 rounded-e-md bg-white px-2 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="crimson" class="size-4">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                    </svg>
                                                                    <span
                                                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible invisible absolute z-10 inline-block rounded bg-gray-900 px-2 py-1 text-xs font-medium text-white opacity-0 shadow-sm transition-opacity dark:bg-neutral-700"
                                                                        role="tooltip">
                                                                        Hapus
                                                                    </span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="grid gap-3 border-t border-gray-200 px-6 py-4 dark:border-neutral-700 md:flex md:items-center md:justify-between">
                            <div class="max-w-sm space-y-3">
                                <select
                                    class="block w-full rounded-lg border border-gray-200 px-3 py-2 pe-9 text-sm focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>5</option>
                                    <option selected>10</option>
                                    <option>20</option>
                                </select>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button type="button" onclick="previousPage()"
                                        class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                        Prev
                                    </button>

                                    @for ($i = 1; $i <= $pagination['lastPage']; $i++)
                                        <button type="button" onclick="changePage({{ $i }})"
                                            class="{{ $i == $pagination['currentPage'] ? 'inline-flex items-center gap-x-2 rounded-lg border border-gray-200 px-3 py-2 text-sm font-medium text-black shadow-sm bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:text-white dark:bg-neutral-800' : 'inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800' }}">
                                            {{ $i }}
                                        </button>
                                    @endfor

                                    <button type="button" onclick="nextPage()"
                                        class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                        Next
                                        <svg class="size-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function changePage(page) {
            var currentUrl = window.location.href;
            var newUrl = currentUrl.split('?')[0] + '?page=' + page;
            window.location.href = newUrl;
        }

        function previousPage() {
            var page = parseInt("{{ $pagination['currentPage'] }}");
            if (page > 1) {
                var newUrl = "{{ $pagination['path'] }}" + '?page=' + (page - 1);
                window.location.href = newUrl;
            }
        }

        function nextPage() {
            var page = parseInt("{{ $pagination['currentPage'] }}");
            if (page < {{ $pagination['lastPage'] }}) {
                var newUrl = "{{ $pagination['path'] }}" + '?page=' + (page + 1);
                window.location.href = newUrl;
            }
        }

        function confirmDelete(event, id) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus?')) {
                document.getElementById('deleteForm_' + id).submit();
            }
        }

        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                $('#dataTable tbody tr').each(function() {
                    var rowData = $(this).text().toLowerCase();
                    if (rowData.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
@endsection
