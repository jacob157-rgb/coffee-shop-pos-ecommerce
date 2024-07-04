@extends('layouts.auth')

@section('auth')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" class="w-full max-w-md p-6 mx-auto">
        <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:border-neutral-700 dark:bg-neutral-900">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Daftar</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Sudah mempunyai akun?
                        <a class="font-medium text-blue-600 decoration-2 hover:underline dark:text-blue-500" href="/login">
                            Masuk disini
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <!-- Form -->
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="grid gap-y-4">

                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block mb-2 text-sm dark:text-white">Email</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="block w-full px-4 py-3 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        value="{{ old('email') }}" required aria-describedby="email-error">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-xs text-red-600" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="password" class="block mb-2 text-sm dark:text-white">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="block w-full px-4 py-3 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required aria-describedby="password-error">
                                </div>
                                @error('password')
                                    <p class="mt-2 text-xs text-red-600" id="password-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="confirm-password" class="block mb-2 text-sm dark:text-white">Ulangi
                                    Password</label>
                                <div class="relative">
                                    <input type="password" id="confirm-password" name="password_confirmation"
                                        class="block w-full px-4 py-3 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required aria-describedby="confirm-password-error">
                                </div>
                                @error('password_confirmation')
                                    <p class="mt-2 text-xs text-red-600" id="confirm-password-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">Daftar</button>
                        </div>
                    </form>
                    <!-- End Form -->

                    <div
                        class="flex items-center py-3 text-xs text-gray-400 before:me-6 before:flex-1 before:border-t before:border-gray-200 after:ms-6 after:flex-1 after:border-t after:border-gray-200 dark:text-neutral-500 dark:before:border-neutral-600 dark:after:border-neutral-600">
                        atau
                    </div>

                    @include('partials.google_button')

                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
