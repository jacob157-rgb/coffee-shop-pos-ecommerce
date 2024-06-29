@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <p class="text-2xl font-bold text-center">DATA KATEGORI</p>
        <a href="/category/create"><button class="rounded bg-blue-500 text-white p-2 mb-2">Tambah Kategori</button></a>
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
            <tr>
                <th class="bg-blue-500 text-white p-2">No</th>
                <th class="bg-blue-500 text-white p-2">Nama Kategori</th>
                <th class="bg-blue-500 text-white p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $row)
                    <tr>
                        <td class="border text-center"> {{ $loop->iteration }}</td>
                        <td class="border ps-2">{{ $row->name }}</td>
                        <td class="border text-center align-content-center p-2">
                            <a href="{{ route('category.edit', $row->id) }}" title="Ubah Data">
                                <button class="rounded-md bg-green-500 text-white p-2">edit</button>
                            </a>
                            <form method="POST" action="{{ route('category.destroy', $row->id) }}" style="display: inline-block;">
                                @method('delete')
                                @csrf
                                <button class="rounded-md bg-red-500 text-white p-2">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
