@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class="max-w-full px-4 py-10 mx-auto sm:px-6 lg:px-8"><!-- Card -->
        <div class="p-4 bg-white shadow rounded-xl dark:bg-neutral-800 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    Informasi Produk
                </h2>
            </div>

            <form>
                <!-- Grid -->
                <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="af-account-full-name"
                            class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Nama Produk
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="max-w-sm">
                            <input type="text"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Masukan Nama Produk">
                        </div>
                    </div>

                    {{-- Foto Produk --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Foto Produk
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="flex items-center gap-5">
                            <div id="dropzone"
                                class="flex items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-md cursor-pointer">
                                <input id="fileInput" type="file" class="hidden" accept="image/*" />
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                                    <line x1="16" x2="22" y1="5" y2="5" />
                                    <line x1="19" x2="19" y1="2" y2="8" />
                                    <circle cx="9" cy="9" r="2" />
                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="af-account-bio" class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Kategory
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <select
                                class="relative block w-full px-3 py-2 -mt-px text-sm border-gray-200 shadow-sm -ms-px pe-9 first:rounded-t-lg last:rounded-b-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 sm:mt-0 sm:w-auto sm:first:ms-0 sm:first:rounded-s-lg sm:first:rounded-se-none sm:last:rounded-e-lg sm:last:rounded-es-none">
                                <option selected>Food</option>
                                <option>Drink</option>
                                <option>Scack</option>
                            </select>
                        </div>
                    </div>






                    <div class="sm:col-span-3">
                        <label for="af-account-bio" class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Deskripsi Product
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <textarea id="af-account-bio"
                            class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="6" placeholder="Masukkan Deskripsi Product"></textarea>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->

                <div class="flex justify-end mt-5 gap-x-2">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-800">
                        Cancel
                    </button>
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->

    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');

        dropzone.addEventListener('click', () => {
            fileInput.click();
        });

        dropzone.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropzone.classList.add('border-blue-500');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('border-blue-500');
        });

        dropzone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropzone.classList.remove('border-blue-500');
            const files = event.dataTransfer.files;
            fileInput.files = files;
            // Handle the files as needed, e.g., upload them
        });

        fileInput.addEventListener('change', (event) => {
            const files = event.target.files;
            // Handle the files as needed, e.g., upload them
        });
    </script>
@endsection
