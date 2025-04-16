@extends('layouts.app')

@section('title', 'Tambah Teguran Tertulis')

@section('content')
    <h3>Tambah Teguran Tertulis</h3>
    <form action="{{ route('teguran-tertulis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Karyawan</label>
            <select name="karyawan_id" class="form-control" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Teguran</label>
            <textarea name="isi_teguran" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Ditandatangani Oleh</label>
            <input type="text" name="ditandatangani_oleh" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
