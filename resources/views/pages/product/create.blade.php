@extends('layouts.dashboard')

@section('content')
<div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
    <h3 class="font-medium text-black dark:text-white">
    Tambah Data Kategori
    </h3>
</div>
<form action="/product" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- ====== Form Elements Section Start -->
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
            <div class="flex flex-col gap-9">
            <!-- File upload -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="flex flex-col gap-5.5 p-6.5">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">Foto Produk</label>
                            <input type="file" name="product_pict" value="{{ old('product_pict') }}" class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-9">
            <!-- Textarea Fields -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex flex-col gap-5.5 p-6.5">
                    <div>
                        <div class="w-full">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Produk</label>
                            <input name="product_name" value="{{ old('product_name') }}" type="text" placeholder="Masukkan Nama Produk" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                        </div>
                        <div>
                            <label class="mb-3 pt-4 block text-sm font-medium text-black dark:text-white">Kategori</label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                            <select name="category_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true"
                                >
                                @foreach ($category as $cat)
                                <option value="{{ $cat->id }}"> {{ $cat->category }}</option>
                                @endforeach
                            </select>
                        <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <g opacity="0.8">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                    fill="#637381"
                                ></path>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <label class="mb-3 mt-4 block text-sm font-medium text-black dark:text-white">Detail</label>
                    <textarea name="product_desc" value="{{ old('product_desc') }}" rows="6" placeholder="Masukkan Detail Product" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>
                <div class="pt-4">
                    <a href="{{ route('product.index') }}">
                        <button type="button" class="justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">Kembali</button>
                    </a>
                    <button type="submit" class="justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
