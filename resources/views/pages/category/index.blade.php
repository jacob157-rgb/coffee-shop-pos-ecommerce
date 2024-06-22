@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <p class="text-2xl text-center">DATA KATEGORI</p>
        <a href="/category/create"><button class="rounded-full bg-blue-500 text-white p-2 mb-2">Tambah Kategori</button></a>
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
            <tr>
                <th class="bg-blue-500 text-white p-2">No</th>
                <th class="bg-blue-500 text-white p-2">Nama Kategori</th>
                <th class="bg-blue-500 text-white p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($index as $row)
                    <tr>
                        <td class="border"> {{ $loop->iteration }}</td>
                        <td class="border">{{ $row->category }}</td>
                        <td class="border text-center align-content-center p-2">
                            <button class="rounded-md bg-green-500 text-white p-2">edit</button>
                            <button class="rounded-md bg-red-500 text-white p-2">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
