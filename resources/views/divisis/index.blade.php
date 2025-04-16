@extends('layouts.app')

@section('title', 'Daftar Divisi')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Divisi</h3>
        <a href="{{ route('divisis.create') }}" class="btn btn-primary">Tambah Divisi</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Divisi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($divisis as $divisi)
                <tr>
                    <td>{{ $divisi->nama_divisi }}</td>
                    <td>{{ $divisi->deskripsi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('divisis.edit', $divisi) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('divisis.destroy', $divisi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
