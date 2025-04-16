@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
    <h3>Tambah Karyawan</h3>
    <form action="{{ route('karyawans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Divisi</label>
            <select name="divisi_id" class="form-control" required>
                @foreach($divisis as $divisi)
                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
