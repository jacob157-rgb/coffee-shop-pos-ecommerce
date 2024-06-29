@if ($categories->isEmpty())
    <tr>
        <td colspan="3" class="px-6 py-2 text-center whitespace-nowrap">
            <span class="text-sm text-gray-600 dark:text-neutral-400">Data kategori kosong, silahkan tambahkan kategori.</span>
        </td>
    </tr>
@else
    @foreach ($categories as $index => $row)
        <tr>
            <td class="px-6 py-2 whitespace-nowrap">
                <div>
                    <p class="text-sm decoration-2 hover:underline">{{ $index + 1 }}.</p>
                </div>
            </td>
            <td class="px-6 py-2 text-center whitespace-nowrap">
                <div class="flex items-center justify-start">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $row->name }}</span>
                </div>
            </td>
            <td class="px-6 py-2 whitespace-nowrap">
                <div class="flex justify-end">
                    <div class="inline-flex items-center transition-all bg-white border border-gray-300 divide-x divide-gray-300 rounded-lg shadow-sm group dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-700">
                        <div class="inline-block hs-tooltip">
                            <a href="{{ route('category.edit', $row->id) }}" class="hs-tooltip-toggle inline-flex items-center justify-center gap-x-2 rounded-s-md bg-white px-2 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <span class="absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700" role="tooltip">
                                    Edit
                                </span>
                            </a>
                        </div>
                        <div class="inline-block hs-tooltip">
                            <form method="POST" action="{{ route('category.destroy', $row->id) }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="hs-tooltip-toggle inline-flex items-center justify-center gap-x-2 rounded-e-md bg-white px-2 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="crimson" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    <span class="absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700" role="tooltip">
                                        Hapus
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@endif
