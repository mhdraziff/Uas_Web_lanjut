@extends('layout.template')
@section('title', 'Input Data Music')
@section('content')
    <h2 class="mb-4">Edit Music</h2>
    <form action="/music/{{ $music->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Music:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $music->id }}" disabled>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $music->judul }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $music->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->judul_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="makna" class="form-label">Makna:</label>
            <textarea class="form-control" id="makna" name="makna" rows="4" required="">{{ $music->makna }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun:</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $music->tahun }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="penyanyi" class="form-label">Penyanyi:</label>
            <input type="text" class="form-control" id="penyanyi" name="penyanyi" value="{{ $music->penyanyi }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Sebelumnya:</label>
            <img src="/images/{{ $music['foto_sampul'] }}" class="img-thumbnail" alt="..." width="100px">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
