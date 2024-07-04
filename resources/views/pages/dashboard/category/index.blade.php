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
                            <button id="addCategoryBtn" onclick="submitOrModal()" data-hs-overlay="#categoryCreateModal"
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
    <div id="categoryCreateModal"
        class="hs-overlay size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Tambah Kategori
                    </h3>
                    <button type="button"
                        class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-full size-7 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:text-white dark:hover:bg-neutral-700"
                        data-hs-overlay="#categoryCreateModal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="p-4 overflow-y-auto">
                        <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">Nama
                            Kategori</label>
                        <input type="text" id="input-label" name="name"
                            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500"
                            autofocus="">
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2 dark:border-neutral-700">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800"
                            data-hs-overlay="#categoryCreateModal">
                            Batal
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function editCategory(id) {
            document.getElementById('category-name-' + id).classList.add('hidden');
            document.getElementById('category-input-' + id).classList.remove('hidden');
            document.getElementById('category-actions-' + id).classList.add('hidden');
            document.getElementById('category-edit-actions-' + id).classList.remove('hidden');
        }

        function cancelEdit(id) {
            document.getElementById('category-name-' + id).classList.remove('hidden');
            document.getElementById('category-input-' + id).classList.add('hidden');
            document.getElementById('category-actions-' + id).classList.remove('hidden');
            document.getElementById('category-edit-actions-' + id).classList.add('hidden');
        }

        let currentPage = 1;
        let lastPage = {{ $categories->lastPage() }};
        let pageSize = {{ $categories->perPage() }};

        document.addEventListener('DOMContentLoaded', function() {
            fetchCategories('', 1, pageSize);
            submitOrModal()
        });

        document.getElementById('searchInput').addEventListener('input', function(event) {
            const query = event.target.value.trim();
            fetchCategories(query, 1, pageSize);
            submitOrModal();
        });

        function submitOrModal() {
            let formInput = document.getElementById('searchInput').value.trim();
            let submitButton = document.getElementById('addCategoryBtn');

            if (formInput === "") {
                // Jika input pencarian kosong, tampilkan modal
                document.getElementById('categoryCreateModal').classList.remove('invisible')
                submitButton.setAttribute("data-hs-overlay", "#categoryCreateModal");
                submitButton.onclick = function() {
                    // Hanya membuka modal jika input kosong
                    let modal = new HSOverlay(document.getElementById('categoryCreateModal'));
                    modal.show();
                };
            } else {
                // Jika input tidak kosong, kirimkan form pencarian
                document.getElementById('categoryCreateModal').classList.add('invisible')
                submitButton.removeAttribute("data-hs-overlay");
                submitButton.onclick = function() {
                    document.getElementById('searchForm').submit();
                };
            }
        }


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
