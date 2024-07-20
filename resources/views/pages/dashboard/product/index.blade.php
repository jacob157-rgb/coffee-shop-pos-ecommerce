@extends('layouts.dashboard')

@section('content')
    <!-- Table Section -->
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div
                    class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:border-neutral-700 dark:bg-neutral-800">
                    <!-- Header -->
                    <div
                        class="grid gap-3 px-6 py-4 border-b border-gray-200 dark:border-neutral-700 md:flex md:items-center md:justify-between">
                        <div class="flex-col w-1/2 md:w-1/4">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Data Produk
                            </h2>
                            <!-- Input -->
                            <div class="mt-2">
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
                            </div>
                            <!-- End Input -->
                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50"
                                    href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    Tambah Produk
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="py-3 ps-6 text-start">
                                    <span
                                        class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                        No.
                                    </span>
                                </th>

                                <th scope="col" class="py-3 pe-6 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                            Produk
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                            Kategori
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                            Deskripsi
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                            Status
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                            Aksi
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody id="productTableBody" class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @include('partials.product_table')
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
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6" />
                                    </svg>
                                    Prev
                                </button>

                                <!-- Page numbers will be dynamically generated -->
                                <span id="paginationNumbers" class="space-x-2"></span>

                                <button type="button" onclick="nextPage()"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                    Next
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
    <!-- End Table Section -->

    <script>
        let currentPage = 1;
        let lastPage = {{ $products->lastPage() }};
        let pageSize = {{ $products->perPage() }};

        document.addEventListener('DOMContentLoaded', function() {
            fetchProducts('', 1, pageSize);
        });

        document.getElementById('searchInput').addEventListener('input', function(event) {
            const query = event.target.value.trim();
            fetchProducts(query, 1, pageSize);
        });

        document.getElementById('pageSizeSelect').addEventListener('change', function(event) {
            pageSize = event.target.value; // Perbarui ukuran halaman
            fetchProducts('', 1, pageSize); // Muat ulang kategori dengan ukuran halaman baru
        });

        function fetchProducts(query = '', page = 1, size = pageSize) {
            const xhr = new XMLHttpRequest();
            const url = `{{ route('product.index') }}?search=${query}&page=${page}&pageSize=${size}`;

            xhr.open('GET', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    document.getElementById('productTableBody').innerHTML = response.html;
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
                fetchProducts('', currentPage - 1, pageSize);
            }
        }

        function nextPage() {
            if (currentPage < lastPage) {
                fetchProducts('', currentPage + 1, pageSize);
            }
        }

        function changePage(page) {
            fetchProducts('', page, pageSize);
        }
    </script>

    <script>
        function submitForm(productId) {
            const form = document.getElementById('form-' + productId);
            const checkbox = document.getElementById('hs-small-switch-' + productId);

            const isActiveInput = document.createElement('input');
            isActiveInput.type = 'hidden';
            isActiveInput.name = 'isactive';
            isActiveInput.value = checkbox.checked ? 1 : 0;

            form.appendChild(isActiveInput);

            form.submit();
        }
    </script>
@endsection
