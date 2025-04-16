@extends('layouts.app')

@section('title', 'Tambah Surat Peringatan')

@section('content')
    <h3>Tambah Surat Peringatan</h3>
    <form action="{{ route('surat-peringatans.store') }}" method="POST">
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
            <label>Tingkat SP</label>
            <select name="tingkat" class="form-control" required>
                <option value="1">SP 1</option>
                <option value="2">SP 2</option>
                <option value="3">SP 3</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi SP</label>
            <textarea name="isi_sp" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Ditandatangani Oleh</label>
            <input type="text" name="ditandatangani_oleh" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
