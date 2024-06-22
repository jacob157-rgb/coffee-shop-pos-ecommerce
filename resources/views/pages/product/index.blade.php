@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <p class="text-2xl text-center">DATA PRODUK</p>
        <button class="rounded-full bg-blue-500 text-white p-2 mb-2">Tambah Produk</button>
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
            <tr>
                <th class="bg-blue-500 text-white p-2">No</th>
                <th class="bg-blue-500 text-white p-2">Kategori</th>
                <th class="bg-blue-500 text-white p-2">Nama Produk</th>
                <th class="bg-blue-500 text-white p-2">Deskripsi</th>
                <th class="bg-blue-500 text-white p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($index as $row)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td class="border">{{ $row->category_id }}</td>
                        <td class="border">{{ $row->product_name }}</td>
                        <td class="border">{{ $row->product_desc }}</td>
                        {{-- <td class="border">{{ $row->category }}</td> --}}
                        <td class="border text-center align-content-center p-2">
                            <button class="rounded-md bg-success text-white p-2">edit</button>
                            <button class="rounded-md bg-danger text-white p-2">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
