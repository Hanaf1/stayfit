<!-- resources/views/recommendations/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Rekomendasi Makanan dan Minuman</h1>

    <form action="{{ route('rekomendasi.store') }}" method="POST">
        @csrf
        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" name="pekerjaan" required>

        <label for="makanan">Makanan:</label>
        <input type="text" name="makanan" required>

        <label for="minuman">Minuman:</label>
        <input type="text" name="minuman" required>

        <button type="submit">Simpan</button>
    </form>
@endsection
