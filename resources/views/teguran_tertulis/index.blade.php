@extends('layouts.app')

@section('title', 'Teguran Tertulis')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Teguran Tertulis</h3>
        <a href="{{ route('teguran-tertulis.create') }}" class="btn btn-primary">Tambah Teguran</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Isi Teguran</th>
                <th>Ditandatangani Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teguranTertulis as $teguran)
                <tr>
                    <td>{{ $teguran->karyawan->nama }}</td>
                    <td>{{ $teguran->tanggal }}</td>
                    <td>{{ Str::limit($teguran->alasan_teguran, 30) }}</td>
                    <td>{{ $teguran->ditandatangani_oleh }}</td>
                    <td>
                        <a href="{{ route('teguran-tertulis.edit', $teguran) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('teguran-tertulis.destroy', $teguran) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
