@extends('layouts.app')

@section('title', 'Form Pernyataan')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Form Pernyataan Karyawan</h3>
        <a href="{{ route('form-pernyataans.create') }}" class="btn btn-primary">Tambah Form Pernyataan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Pernyataan</th>
                <th>Ditandatangani Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formPernyataans as $form)
                <tr>
                    <td>{{ $form->karyawan->nama }}</td>
                    <td>{{ $form->tanggal }}</td>
                    <td>{{ Str::limit($form->isi_pernyataan, 30) }}</td>
                    <td>{{ $form->ditandatangani_oleh }}</td>
                    <td>
                        <a href="{{ route('form-pernyataans.edit', $form) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('form-pernyataans.destroy', $form) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
