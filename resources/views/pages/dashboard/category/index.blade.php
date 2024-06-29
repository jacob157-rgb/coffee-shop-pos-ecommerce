@extends('layouts.dashboard')

@section('content')
    <div>
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="inline-block min-w-full p-1.5 align-middle">
                    <div
                        class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:border-neutral-700 dark:bg-neutral-900">
                        <!-- Header -->
                        <div
                            class="grid gap-3 px-6 py-4 border-b border-gray-200 dark:border-neutral-700 md:flex md:items-center md:justify-between">
                            <!-- Input -->
                            <div class="sm:col-span-1">
                                <form id="searchForm" action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <label for="searchInput" class="sr-only">Search</label>
                                    <div class="relative">
                                        <input type="text" id="searchInput" name="name"
                                            class="block w-full px-3 py-2 text-sm border border-gray-200 rounded-lg ps-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            placeholder="Search">
                                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4">
                                            <svg class="text-gray-400 size-4 dark:text-neutral-500"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001a1.007 1.007 0 0 0-.073.072l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.072-.073zm-5.442 1.68a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" />
                                            </svg>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Input -->
                            <button id="addCategoryBtn"
                                class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 border border-transparent rounded-md shadow-sm gap-x-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-neutral-900">
                                Tambah Kategori
                            </button>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" id="categoryTable">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-sm font-semibold text-left text-gray-900 dark:text-white">
                                            No.
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-sm font-semibold text-left text-gray-900 dark:text-white">
                                            Kategori
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-sm font-semibold text-right text-gray-900 dark:text-white">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700" id="categoryTableBody">
                                    @include('partials.category_table', ['categories' => $categories])
                                </tbody>
                            </table>
                            <!-- End Table -->

                            <!-- Footer -->
                            <div
                                class="grid gap-3 px-6 py-4 border-t border-gray-200 dark:border-neutral-700 md:flex md:items-center md:justify-between">
                                <div class="max-w-sm space-y-3">
                                    <select id="pageSizeSelect"
                                        class="block w-full px-3 py-2 text-sm border border-gray-200 rounded-lg pe-9 focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400">
                                        <option>5</option>
                                        <option selected>10</option>
                                        <option>20</option>
                                    </select>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <button type="button" onclick="previousPage()"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m15 18-6-6 6-6" />
                                            </svg>
                                            Prev
                                        </button>

                                        <!-- Page numbers will be dynamically generated -->
                                        <span id="paginationNumbers" class="space-x-2"></span>

                                        <button type="button" onclick="nextPage()"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            Next
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
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
        </div>
        <!-- End Card -->
    </div>

    <script>
        let currentPage = 1;
        let lastPage = {{ $categories->lastPage() }};
        let pageSize = {{ $categories->perPage() }};

        // Panggil fetchCategories untuk halaman pertama tanpa query pencarian saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            fetchCategories('', 1, pageSize);
        });

        // Event listener untuk input pencarian
        document.getElementById('searchInput').addEventListener('input', function(event) {
            const query = event.target.value.trim(); // Ambil nilai input dan hilangkan spasi di awal dan akhir
            fetchCategories(query, 1, pageSize); // Panggil fungsi fetchCategories dengan query baru
        });

        // Event listener untuk tombol "Tambah Kategori"
        document.getElementById('addCategoryBtn').addEventListener('click', function(event) {
            event.preventDefault();
            const form = document.getElementById('searchForm');
            const formData = new FormData(form);

            // Submit form pencarian ke route 'category.store'
            fetch('{{ route('category.store') }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        // Jika sukses, panggil kembali fetchCategories tanpa query
                        fetchCategories('', 1, pageSize);
                    } else {
                        // Handle error jika ada
                        console.error('Gagal menambahkan kategori.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Event listener untuk perubahan ukuran halaman
        document.getElementById('pageSizeSelect').addEventListener('change', function(event) {
            pageSize = event.target.value; // Perbarui ukuran halaman
            fetchCategories('', 1, pageSize); // Muat ulang kategori dengan ukuran halaman baru
        });

        function fetchCategories(query = '', page = 1, size = pageSize) {
            const xhr = new XMLHttpRequest();
            const url = `{{ route('category.index') }}?search=${query}&page=${page}&pageSize=${size}`;

            xhr.open('GET', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    document.getElementById('categoryTableBody').innerHTML = response.html;
                    updatePagination(response.pagination);
                    currentPage = response.pagination.currentPage;
                    lastPage = response.pagination.lastPage;
                    pageSize = response.pagination.pageSize;
                }
            };

            xhr.send();
        }

        function updatePagination(pagination) {
            const paginationWrapper = document.getElementById('paginationNumbers');
            let paginationHtml = '';

            for (let i = 1; i <= pagination.lastPage; i++) {
                paginationHtml +=
                    `<button type="button" onclick="changePage(${i})" class="${i === pagination.currentPage ? 'inline-flex items-center gap-x-2 rounded-lg border border-gray-200 px-3 py-2 text-sm font-medium text-black shadow-sm bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:text-white dark:bg-neutral-800' : 'inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800'}">${i}</button>`;
            }

            paginationWrapper.innerHTML = paginationHtml;
        }

        function previousPage() {
            if (currentPage > 1) {
                fetchCategories('', currentPage - 1, pageSize);
            }
        }

        function nextPage() {
            if (currentPage < lastPage) {
                fetchCategories('', currentPage + 1, pageSize);
            }
        }

        function changePage(page) {
            fetchCategories('', page, pageSize);
        }
    </script>
@endsection
