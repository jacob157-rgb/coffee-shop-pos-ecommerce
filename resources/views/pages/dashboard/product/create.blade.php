@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                                <input type="text" name="name"
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
                            @include('partials.category_dropdown')
                        </div>

                        {{-- Foto Produk --}}
                        <div class="sm:col-span-3">
                            <label for="dropzone" class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Foto Produk
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <div class="flex items-center gap-5">
                                <div
                                    class="relative flex items-center justify-center w-full h-auto max-w-xs border-2 border-gray-300 border-dashed rounded-md cursor-pointer dropzone aspect-square dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 md:h-48 md:w-48 md:max-w-none">
                                    <input class="hidden fileInput" type="file" accept="image/*" />
                                    <svg class="w-6 h-6 text-gray-500 dropzone-icon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                                        <line x1="16" x2="22" y1="5" y2="5" />
                                        <line x1="19" x2="19" y1="2" y2="8" />
                                        <circle cx="9" cy="9" r="2" />
                                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                    </svg>
                                    <img class="hidden object-cover w-full h-full rounded-md dropzone-preview" />
                                    <div class="absolute flex space-x-2 dropzone-buttons bottom-2 right-2">
                                        <button type="button" data-hs-overlay="#crop-modal"
                                            class="crop-button inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-crop">
                                                <path d="M6 2v14a2 2 0 0 0 2 2h14" />
                                                <path d="M18 22V8a2 2 0 0 0-2-2H2" />
                                            </svg>
                                        </button>
                                        <button type="button"
                                            class="delete-button inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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

                        {{-- Deskripsi Produk --}}
                        <div class="sm:col-span-3">
                            <label for="product-description"
                                class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Deskripsi Produk
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <textarea id="product-description" name="desc"
                                class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                rows="5" placeholder="Masukan Deskripsi Produk"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="sku-container">
                <div class="sku-form">
                    <div class="p-4 bg-white shadow rounded-xl dark:bg-neutral-800 sm:p-7">
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                                Variant Produk
                            </h2>
                        </div>
                        <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
                            {{-- Nama Variant --}}
                            <div class="sm:col-span-3">
                                <label class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                    Nama Variant
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <div class="sm:flex">
                                    <input type="text" name="sku[0][name]"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Masukan Nama Variant">
                                </div>
                            </div>

                            {{-- Foto Variant --}}
                            <div class="sm:col-span-3">
                                <label for="dropzone"
                                    class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                    Foto Variant
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <div class="flex items-center gap-5">
                                    <div
                                        class="relative flex items-center justify-center w-full h-auto max-w-xs border-2 border-gray-300 border-dashed rounded-md cursor-pointer dropzone aspect-square dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 md:h-48 md:w-48 md:max-w-none">
                                        <input class="hidden fileInput" type="file" name="sku[0][photo]"
                                            accept="image/*" />
                                        <svg class="w-6 h-6 text-gray-500 dropzone-icon"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                                            <line x1="16" x2="22" y1="5" y2="5" />
                                            <line x1="19" x2="19" y1="2" y2="8" />
                                            <circle cx="9" cy="9" r="2" />
                                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                        </svg>
                                        <img class="hidden object-cover w-full h-full rounded-md dropzone-preview" />
                                        <div class="absolute flex space-x-2 dropzone-buttons bottom-2 right-2">
                                            <button type="button" data-hs-overlay="#crop-modal"
                                                class="crop-button inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-crop">
                                                    <path d="M6 2v14a2 2 0 0 0 2 2h14" />
                                                    <path d="M18 22V8a2 2 0 0 0-2-2H2" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="delete-button inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
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
                                <input type="text" name="sku[0][price]"
                                    class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg shadow-sm variant-price pe-16 ps-10 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <input type="hidden" class="nominal">
                                <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none start-0 ps-4">
                                    <span class="text-gray-500 dark:text-neutral-500">Rp.</span>
                                </div>
                                <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none end-0 pe-4">
                                    <span class="text-gray-500 dark:text-neutral-500">IDR</span>
                                </div>
                            </div>

                            {{-- Stok Variant --}}
                            <div class="sm:col-span-3">
                                <label for="product-description"
                                    class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                    Stock Variant
                                </label>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg dark:border-neutral-700 dark:bg-neutral-700 sm:col-span-9"
                                data-hs-input-number="">
                                <div class="flex items-center justify-between w-full gap-x-1">
                                    <div class="px-3 py-2 grow">
                                        <input name="sku[0][stock]"
                                            class="w-full p-0 text-sm text-gray-800 bg-transparent border-0 focus:ring-0 dark:text-white"
                                            type="number" placeholder="Masukan Jumlah Stok">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="crop-modal"
                class="hs-overlay crop-modal size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden">
                <div
                    class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
                    <div
                        class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                        <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">
                                Crop Gambar
                            </h3>
                            <button type="button"
                                class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-full size-7 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:text-white dark:hover:bg-neutral-700"
                                data-hs-overlay="#crop-modal">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <p class="text-gray-800 dark:text-neutral-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                            </p>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2 dark:border-neutral-700">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800"
                                data-hs-overlay="#crop-modal">
                                Batal
                            </button>
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                    Submit
                </button>
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm add-sku-button gap-x-2 hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                    Tambah Variant lagi +
                </button>
            </div>
    </form>

    <script>
        const cropModal = new HSOverlay(document.querySelector('#crop-modal'));
        const openBtn = document.querySelector('#crop-button');

        openBtn.addEventListener('click', () => {
            modal.open();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize all dropzones
            const dropzones = document.querySelectorAll('.dropzone');
            dropzones.forEach(initializeDropzone);

            function initializeDropzone(dropzone) {
                const fileInput = dropzone.querySelector('.fileInput');
                const previewImage = dropzone.querySelector('.dropzone-preview');
                const dropzoneIcon = dropzone.querySelector('.dropzone-icon');
                const dropzoneButtons = dropzone.querySelector('.dropzone-buttons');
                const cropButton = dropzone.querySelector('.crop-button');
                const deleteButton = dropzone.querySelector('.delete-button');

                dropzone.addEventListener('click', () => fileInput.click());

                fileInput.addEventListener('change', () => {
                    const file = fileInput.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            previewImage.src = e.target.result;
                            previewImage.classList.remove('hidden');
                            dropzoneIcon.classList.add('hidden');
                            dropzoneButtons.classList.remove('hidden');
                            dropzoneButtons.classList.add('flex');
                        };
                        reader.readAsDataURL(file);
                    }
                });

                let croppieInstance;
                cropButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    const croppieModal = document.querySelector('#croppie-modal');
                    const croppieContainer = croppieModal.querySelector('#croppie-container');

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
                        url: previewImage.src
                    });

                    croppieModal.classList.remove('hidden');

                    document.querySelector('#croppie-cancel').addEventListener('click', () => {
                        croppieModal.classList.add('hidden');
                    });

                    document.querySelector('#croppie-save').addEventListener('click', () => {
                        croppieInstance.result('base64').then((croppedImage) => {
                            previewImage.src = croppedImage;
                            croppieModal.classList.add('hidden');
                        });
                    });
                });

                deleteButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    fileInput.value = '';
                    previewImage.src = '';
                    previewImage.classList.add('hidden');
                    dropzoneIcon.classList.remove('hidden');
                    dropzoneButtons.classList.add('hidden');
                    dropzoneButtons.classList.remove('flex');
                });
            }
        });
    </script>


    {{-- Script untuk Format IDR --}}
    <script>
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('variant-price')) {
                // Menghapus karakter non-numerik
                let value = e.target.value.replace(/\D/g, '');

                // Mengupdate input tersembunyi yang terkait dengan elemen input yang berubah
                e.target.nextElementSibling.value = value;

                // Memformat angka dengan pemisah ribuan
                let formattedValue = new Intl.NumberFormat('id-ID').format(value);

                // Menampilkan nilai terformat
                e.target.value = formattedValue;
            }
        });
    </script>


    <script>
        let skuCount = 1;

        document.addEventListener('click', (event) => {
            // Add SKU button functionality
            if (event.target.classList.contains('add-sku-button')) {
                const skuContainer = document.getElementsByClassName('sku-container')[0];

                const skuHtml = `
            <div class="sku-container">

            <div class="sku-form">
                <div class="p-4 bg-white shadow rounded-xl dark:bg-neutral-800 sm:p-7">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                            Variant Produk
                        </h2>
                        <button type="button" class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white bg-red-500 border border-transparent rounded-lg gap-x-2 hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none hapus-variant-button">
                            Hapus Variant -
                        </button>
                    </div>
                    <div class="grid gap-2 mt-4 sm:grid-cols-12 sm:gap-6">
                        <!-- Nama Variant -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Nama Variant
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <div class="sm:flex">
                                <input type="text" name="sku[${skuCount}][name]"
                                    class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Masukan Nama Variant">
                            </div>
                        </div>

                        <!-- Foto Variant -->
                        <div class="sm:col-span-3">
                            <label for="dropzone" class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Foto Variant
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <div class="flex items-center gap-5">
                                <div
                                        class="relative flex items-center justify-center w-full h-auto max-w-xs border-2 border-gray-300 border-dashed rounded-md cursor-pointer dropzone aspect-square dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 md:h-48 md:w-48 md:max-w-none">
                                        <input class="hidden fileInput" type="file" name="sku[${skuCount}][photo]"
                                            accept="image/*" />
                                        <svg class="w-6 h-6 text-gray-500 dropzone-icon"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                                            <line x1="16" x2="22" y1="5" y2="5" />
                                            <line x1="19" x2="19" y1="2" y2="8" />
                                            <circle cx="9" cy="9" r="2" />
                                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                        </svg>
                                        <img class="hidden object-cover w-full h-full rounded-md dropzone-preview" />
                                        <div class="absolute flex space-x-2 dropzone-buttons bottom-2 right-2">
                                            <button data-hs-overlay="#crop-modal"
                                                class="crop-button inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-crop">
                                                    <path d="M6 2v14a2 2 0 0 0 2 2h14" />
                                                    <path d="M18 22V8a2 2 0 0 0-2-2H2" />
                                                </svg>
                                            </button>
                                            <button
                                                class="delete-button inline-flex items-center gap-x-2 rounded-full border border-gray-200 bg-white p-1.5 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
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

                        <!-- Harga Variant -->
                        <div class="sm:col-span-3">
                            <label for="product-description"
                                class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Harga Variant
                            </label>
                        </div>
                        <div class="relative sm:col-span-9">
                            <input type="text" name="sku[${skuCount}][price]"
                                class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg shadow-sm variant-price pe-16 ps-10 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <input type="hidden" class="nominal">
                            <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none start-0 ps-4">
                                <span class="text-gray-500 dark:text-neutral-500">Rp.</span>
                            </div>
                            <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none end-0 pe-4">
                                <span class="text-gray-500 dark:text-neutral-500">IDR</span>
                            </div>
                        </div>

                        <!-- Stok Variant -->
                        <div class="sm:col-span-3">
                            <label for="product-description"
                                class="mt-2.5 inline-block text-sm text-gray-800 dark:text-neutral-200">
                                Stock Variant
                            </label>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg dark:border-neutral-700 dark:bg-neutral-700 sm:col-span-9"
                            data-hs-input-number="">
                            <div class="flex items-center justify-between w-full gap-x-1">
                                <div class="px-3 py-2 grow">
                                    <input name="sku[${skuCount}][stock]"
                                        class="w-full p-0 text-sm text-gray-800 bg-transparent border-0 focus:ring-0 dark:text-white"
                                        type="number" placeholder="Masukan Jumlah Stok">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            `;

                skuContainer.insertAdjacentHTML('afterend', skuHtml);
                skuCount++;
            }

            // Hapus Variant button functionality
            if (event.target.classList.contains('hapus-variant-button')) {
                const skuForm = event.target.closest('.sku-form');
                skuForm.remove();
            }
        });
    </script>
@endsection
