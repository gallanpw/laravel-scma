@extends('layouts.app')

@section('title', 'Tambah Divisi')

@section('content')
    <h3>Tambah Divisi</h3>
    <form action="{{ route('divisis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Divisi</label>
            <input type="text" name="nama_divisi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
