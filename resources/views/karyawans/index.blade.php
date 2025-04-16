@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Karyawan</h3>
        <a href="{{ route('karyawans.create') }}" class="btn btn-primary">Tambah Karyawan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->nip }}</td>
                    <td>{{ $karyawan->divisi->nama }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>{{ $karyawan->tanggal_masuk }}</td>
                    <td>
                        <a href="{{ route('karyawans.edit', $karyawan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('karyawans.destroy', $karyawan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
