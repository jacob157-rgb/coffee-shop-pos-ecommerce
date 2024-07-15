@extends('layouts.dashboard')

@section('content')
    <!-- Card Section -->
    <div class="max-w-full px-4 py-10 mx-auto space-y-2 sm:px-6 lg:px-8">
        <div class="p-4 bg-white shadow rounded-xl dark:bg-neutral-800 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    Informasi Produk
                </h2>
            </div>

            <form id="product-form">
                <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
                    {{-- Nama Produk --}}
                    <div class="sm:col-span-3">
                        <label class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Nama Produk
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input type="text"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Masukan Nama Produk">
                        </div>
                    </div>

                    {{-- Kategori Select --}}
                    <div class="sm:col-span-3">
                        <label for="product-category"
                            class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Kategori
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <select id="product-category" name="category_id"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @include('partials.category_dropdown')
                            </select>
                        </div>
                    </div>

                    {{-- Foto Produk --}}
                    <div class="sm:col-span-3">
                        <label for="dropzone" class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Foto Produk
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="flex items-center gap-5">
                            <div id="dropzone"
                                class="relative flex items-center justify-center w-full h-auto max-w-xs border-2 border-gray-300 border-dashed rounded-md cursor-pointer aspect-square dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 md:h-48 md:w-48 md:max-w-none">
                                <input id="fileInput" type="file" class="hidden" accept="image/*" />
                                <svg id="dropzone-icon" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                                    <line x1="16" x2="22" y1="5" y2="5" />
                                    <line x1="19" x2="19" y1="2" y2="8" />
                                    <circle cx="9" cy="9" r="2" />
                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                </svg>
                                <img id="dropzone-preview" class="hidden object-cover w-full h-full rounded-md" />
                                <div id="dropzone-buttons" class="absolute flex space-x-2 bottom-2 right-2">
                                    <button id="crop-button"
                                        class="inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-crop">
                                            <path d="M6 2v14a2 2 0 0 0 2 2h14" />
                                            <path d="M18 22V8a2 2 0 0 0-2-2H2" />
                                        </svg>
                                    </button>
                                    <button id="delete-button"
                                        class="inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                            <line x1="10" x2="10" y1="11" y2="17" />
                                            <line x1="14" x2="14" y1="11" y2="17" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="sm:col-span-3">
                        <label for="product-description"
                            class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                            Deskripsi Produk
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea id="product-description"
                            class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="5" placeholder="Masukan Deskripsi Produk"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div id="variant-forms-container" class="p-4 bg-white shadow rounded-xl dark:bg-neutral-800 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    Variant Produk
                </h2>
            </div>

            <div class="form-wrapper">
                <form>
                    <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
                        {{-- Nama Variant --}}
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Nama Variant
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <div class="sm:flex">
                                <input type="text"
                                    class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Masukan Nama Variant">
                            </div>
                        </div>

                        {{-- Foto Variant --}}
                        <div class="sm:col-span-3">
                            <label for="dropzone" class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Foto Variant
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <div class="flex items-center gap-5">
                                <div id="dropzone"
                                    class="relative flex items-center justify-center w-full h-auto max-w-xs border-2 border-gray-300 border-dashed rounded-md cursor-pointer aspect-square dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 md:h-48 md:w-48 md:max-w-none">
                                    <input id="fileInput" type="file" class="hidden" accept="image/*" />
                                    <svg id="dropzone-icon" xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-gray-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                                        <line x1="16" x2="22" y1="5" y2="5" />
                                        <line x1="19" x2="19" y1="2" y2="8" />
                                        <circle cx="9" cy="9" r="2" />
                                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                    </svg>
                                    <img id="dropzone-preview" class="hidden object-cover w-full h-full rounded-md" />
                                    <div id="dropzone-buttons" class="absolute flex space-x-2 bottom-2 right-2">
                                        <button id="crop-button"
                                            class="inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-crop">
                                                <path d="M6 2v14a2 2 0 0 0 2 2h14" />
                                                <path d="M18 22V8a2 2 0 0 0-2-2H2" />
                                            </svg>
                                        </button>
                                        <button id="delete-button"
                                            class="inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Harga Variant --}}
                        <div class="sm:col-span-3">
                            <label for="product-description"
                                class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Harga Variant
                            </label>
                        </div>
                        <div class="relative sm:col-span-9">
                            <input type="text" id="variant-price" name="variant-price"
                                class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg shadow-sm pe-16 ps-10 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <input type="hidden" name="nominal" id="nominal">
                            <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none start-0 ps-4">
                                <span class="text-gray-500 dark:text-neutral-500">Rp.</span>
                            </div>
                            <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none end-0 pe-4">
                                <span class="text-gray-500 dark:text-neutral-500">IDR</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="flex justify-end mt-5">
                <button type="button" id="add-variant-button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                    Tambah Variant lagi +
                </button>
            </div>
        </div>
    </div>
    <div id="croppie-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="p-4 bg-white rounded-lg">
            <div id="croppie-container"></div>
            <button id="croppie-cancel"
                class="inline-flex items-center px-4 py-2 mt-4 bg-gray-300 rounded-md">Batal</button>
            <button id="croppie-save"
                class="inline-flex items-center px-4 py-2 mt-4 text-white bg-blue-500 rounded-md">Simpan</button>
        </div>
    </div>

    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');
        const previewImage = document.getElementById('dropzone-preview');
        const dropzoneIcon = document.getElementById('dropzone-icon');
        const dropzoneButtons = document.getElementById('dropzone-buttons');
        const cropButton = document.getElementById('crop-button');
        const deleteButton = document.getElementById('delete-button');
        const croppieModal = document.getElementById('croppie-modal');
        const croppieContainer = document.getElementById('croppie-container');
        const croppieCancel = document.getElementById('croppie-cancel');
        const croppieSave = document.getElementById('croppie-save');
        const productForm = document.getElementById('product-form');

        let croppieInstance;

        window.addEventListener("load", (event) => {
            dropzoneButtons.classList.remove('flex')
            dropzoneButtons.classList.add('hidden')
            croppieModal.classList.remove('flex');
            croppieModal.classList.add('hidden');
        });

        productForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent form submission
        });

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
            const files = event.dataTransfer.files;
            fileInput.files = files;
            showPreview(files[0]);
        });

        fileInput.addEventListener('change', (event) => {
            const files = event.target.files;
            showPreview(files[0]);
        });

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                dropzoneIcon.classList.add('hidden');
                dropzoneButtons.classList.remove('hidden');
                dropzoneButtons.classList.add('flex');

                // Initialize Croppie
                if (croppieInstance) {
                    croppieInstance.destroy();
                }
                croppieInstance = new Croppie(croppieContainer, {
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'square'
                    },
                    boundary: {
                        width: 300,
                        height: 300
                    },
                    showZoomer: true,
                });
                croppieInstance.bind({
                    url: e.target.result
                });
            };
            reader.readAsDataURL(file);
        }

        cropButton.addEventListener('click', (event) => {
            event.stopPropagation();
            croppieModal.classList.add('flex');
            croppieModal.classList.remove('hidden');
        });

        croppieCancel.addEventListener('click', () => {
            croppieModal.classList.add('hidden');
        });

        croppieSave.addEventListener('click', () => {
            croppieInstance.result({
                type: 'base64',
                size: 'viewport'
            }).then((croppedImage) => {
                previewImage.src = croppedImage;
                croppieModal.classList.add('hidden');
            });
        });

        deleteButton.addEventListener('click', (event) => {
            event.stopPropagation();
            event.preventDefault(); // Prevent form submission
            fileInput.value = '';
            previewImage.src = '';
            previewImage.classList.add('hidden');
            dropzoneIcon.classList.remove('hidden');
            dropzoneButtons.classList.remove('flex');
            dropzoneButtons.classList.add('hidden');
        });
    </script>


    {{-- Script untuk Format IDR --}}
    <script>
        document.getElementById('variant-price').addEventListener('input', function(e) {
            // Menghapus karakter non-numerik
            let value = e.target.value.replace(/\D/g, '');

            // Mengupdate input tersembunyi dengan nilai numerik
            document.getElementById('nominal').value = value;

            // Memformat angka dengan pemisah ribuan
            let formattedValue = new Intl.NumberFormat('id-ID').format(value);

            // Menampilkan nilai terformat
            e.target.value = formattedValue;
        });
    </script>
@endsection
