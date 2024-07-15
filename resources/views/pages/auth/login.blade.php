@extends('layouts.auth')

@section('auth')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" class="w-full max-w-md p-6 mx-auto">
        <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:border-neutral-700 dark:bg-neutral-900">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Masuk</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Belum mempunyai akun?
                        <a class="font-medium text-blue-600 decoration-2 hover:underline dark:text-blue-500" href="/register">
                            Daftar disini
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <!-- Form -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block mb-2 text-sm dark:text-white">Email</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="block w-full px-4 py-3 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required aria-describedby="email-error"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class="mt-2 text-xs text-red-600" id="email-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="password" class="block mb-2 text-sm dark:text-white">Password</label>
                                </div>
                                <div class="relative">
                                    <input id="hs-toggle-password" type="password" id="password" name="password"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <button type="button"
                                        data-hs-toggle-password='{
                                        "target": "#hs-toggle-password"
                                        }'
                                        class="absolute end-0 top-0 rounded-e-md p-3.5">
                                        <svg class="size-3.5 flex-shrink-0 text-gray-400 dark:text-neutral-600"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                                r="3"></circle>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-center justify-end mt-2">
                                    <a class="text-sm font-medium text-blue-600 decoration-2 hover:underline"
                                        href="">Lupa Password?</a>
                                </div>
                                @error('password')
                                    <p class="mt-2 text-xs text-red-600" id="password-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->


                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">Masuk</button>
                        </div>
                    </form>
                    <!-- End Form -->


                    <div
                        class="flex items-center py-3 text-xs text-gray-400 before:me-6 before:flex-1 before:border-t before:border-gray-200 after:ms-6 after:flex-1 after:border-t after:border-gray-200 dark:text-neutral-500 dark:before:border-neutral-600 dark:after:border-neutral-600">
                        atau</div>

                    @include('partials.google_button')
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
