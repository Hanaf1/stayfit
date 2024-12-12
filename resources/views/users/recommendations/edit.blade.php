<!-- resources/views/recommendations/edit.blade.php -->

@extends('layouts.app')

@section('content')
 <!-- resources/views/rekomendasi/edit.blade.php -->
    <h1>Edit Rekomendasi Makanan dan Minuman</h1>

    <form action="{{ route('rekomendasi.update', $rekomendasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" name="pekerjaan" value="{{ $rekomendasi->pekerjaan }}" required>

        <label for="makanan">Makanan:</label>
        <input type="text" name="makanan" value="{{ $rekomendasi->makanan }}" required>

        <label for="minuman">Minuman:</label>
        <input type="text" name="minuman" value="{{ $rekomendasi->minuman }}" required>

        <button type="submit">Update</button>
    </form>
@endsection
