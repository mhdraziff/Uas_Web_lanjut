@extends('layout.template')

@section('title', $music ? $music->judul : 'Detail Music')

@section('content')
    @if ($music)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title">{{ $music->judul }}</h2>
                        <p class="card-text">{{ $music->makna }}</p>
                        <p class="card-text">Kategori :
                            {{ $music->category ? $music->category->nama_kategori : 'Tidak ada kategori' }}</p>
                        <p class="card-text">Tahun Terbit : {{ $music->tahun }}</p>
                        <p class="card-text">Penyanyi : {{ $music->penyanyi }}</p>
                        <a href="/" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $music->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data music tidak ditemukan.</p>
    @endif
@endsection
