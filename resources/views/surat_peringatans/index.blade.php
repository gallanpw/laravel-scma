@extends('layouts.app')

@section('title', 'Surat Peringatan')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Surat Peringatan</h3>
        <a href="{{ route('surat-peringatans.create') }}" class="btn btn-primary">Tambah SP</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Tingkat SP</th>
                <th>Tanggal</th>
                <th>Isi SP</th>
                <th>Ditandatangani Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratPeringatans as $sp)
                <tr>
                    <td>{{ $sp->karyawan->nama }}</td>
                    <td>SP {{ $sp->tingkat }}</td>
                    <td>{{ $sp->tanggal }}</td>
                    <td>{{ Str::limit($sp->isi_sp, 30) }}</td>
                    <td>{{ $sp->ditandatangani_oleh }}</td>
                    <td>
                        <a href="{{ route('surat-peringatans.edit', $sp) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('surat-peringatans.destroy', $sp) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
