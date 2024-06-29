@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
            <div class="flex flex-col gap-9">
                <!-- category Form -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                        Update Data User
                        </h3>
                    </div>
                    <form action="/user/{{ $edit->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Nama User</label>
                                    <input name="name" value="{{ old('name',$edit->name) }}" type="text" placeholder="Masukkan Nama User" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                                </div>
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Email</label>
                                    <input name="email" value="{{ old('email',$edit->email) }}" type="email" placeholder="Masukkan Email" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                                </div>
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">Password</label>
                                    <input name="password" value="{{ old('password',$edit->password) }}" type="password" placeholder="Masukkan Password" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"/>
                                </div>
                            </div>
                            
                            <a href="{{ route('user.index') }}">
                                <button type="button" class="justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">Kembali</button>
                            </a>
                            <button type="submit" class="justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
