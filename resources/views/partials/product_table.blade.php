@if ($products->isEmpty())
    <tr>
        <td colspan="6" class="px-6 py-2 text-center whitespace-nowrap">
            <span class="text-sm text-gray-600 dark:text-neutral-400">Data Produk kosong, <a
                    class="underline text-sky-600" href="{{ route('product.create') }}">silahkan tambahkan
                    produk.</a></span>
        </td>
    </tr>
@else
    @foreach ($products as $index => $row)
        <tr id="product-row-{{ $row->id }}">
            <td class="size-px whitespace-nowrap">
                <div class="py-3 ps-6">
                    <span
                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $index + 1 }}.</span>
                </div>
            </td>
            <td class="size-px whitespace-nowrap">
                <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                    <div class="flex items-center gap-x-3">
                        <img class="size-[38px] inline-block rounded-md"
                            src="{{ asset('images/product/' . basename($row->photo)) }}" alt="Image Description">
                        <div class="grow">
                            <span
                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $row->name }}</span>
                        </div>
                    </div>
                </div>
            </td>
            <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Drink</span>
                </div>
            </td>
            <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span
                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $row->description }}</span>
                </div>
            </td>
            <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <div class="flex items-center">
                        <form id="form-{{ $row->id }}" method="POST"
                            action="{{ route('product.updateIsActive', $row->id) }}">
                            @csrf
                            @method('PUT')
                            <input onchange="submitForm({{ $row->id }})" type="checkbox" name="isactive" id="hs-small-switch-{{ $row->id }}" @checked($row->isactive)
                                class="relative h-6 p-px text-transparent transition-colors duration-200 ease-in-out bg-gray-100 border-transparent rounded-full cursor-pointer before:size-5 w-11 before:inline-block before:translate-x-0 before:transform before:rounded-full before:bg-white before:shadow before:ring-0 before:transition before:duration-200 before:ease-in-out checked:border-green-600 checked:bg-none checked:text-green-600 checked:before:translate-x-full checked:before:bg-green-200 focus:ring-blue-600 focus:checked:border-green-600 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:before:bg-neutral-400 dark:checked:border-green-500 dark:checked:bg-green-500 dark:checked:before:bg-blue-200 dark:focus:ring-offset-gray-600">
                        </form>
                        <label for="hs-small-switch-{{ $row->id }}" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">
                            @if ($row->isactive)
                                <span
                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-x-1 rounded-full bg-red-100 px-1.5 py-1 text-xs font-medium text-red-800 dark:bg-red-500/10 dark:text-red-500">
                                    <svg class="size-2.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z">
                                        </path>
                                        <path d="M12 9v4"></path>
                                        <path d="M12 17h.01"></path>
                                    </svg>
                                    Tidak Aktif
                                </span>
                            @endif
                        </label>
                    </div>
                </div>
            </td>

            <td class="size-px whitespace-nowrap">
                <div class="px-6 py-1.5">
                    <div class="inline-block hs-tooltip">
                        <a href="#"
                            class="hs-tooltip-toggle inline-flex items-center justify-center gap-x-2 rounded-s-md bg-white px-2 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="blue" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            <span
                                class="absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:visible hs-tooltip-shown:opacity-100 dark:bg-neutral-700"
                                role="tooltip">
                                Edit
                            </span>
                        </a>
                    </div>
                    <div class="inline-block hs-tooltip">
                        <form method="POST" action="{{ route('product.destroy', $row->id) }}"
                            style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="hs-tooltip-toggle inline-flex items-center justify-center gap-x-2 rounded-e-md bg-white px-2 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="crimson" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                <span
                                    class="absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:visible hs-tooltip-shown:opacity-100 dark:bg-neutral-700"
                                    role="tooltip">
                                    Hapus
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@endif
