@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <p class="text-2xl text-center">DATA USER</p>
        <button class="rounded-full bg-blue-500 text-white p-2 mb-2">Tambah Kategori</button>
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
            <tr>
                <th class="bg-blue-500 text-white p-2">No</th>
                <th class="bg-blue-500 text-white p-2">Nama </th>
                <th class="bg-blue-500 text-white p-2">email </th>
                <th class="bg-blue-500 text-white p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border">1</td>
                <td class="border">qwert</td>
                {{-- <td class="border">{{ $row->name }}</td> --}}
                <td class="border">qwert@</td>
                {{-- <td class="border">{{ $row->password }}</td> --}}
                <td class="border text-center align-content-center p-2">
                    <button class="rounded-md bg-green-500 text-white p-2">edit</button>
                    <button class="rounded-md bg-red-500 text-white p-2">delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
