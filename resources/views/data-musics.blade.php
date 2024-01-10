@extends('layout.template')

@section('title', 'Data Music')

@section('content')

    <h1>Data programming language</h1>
    <a href="/musics/create" class="btn btn-primary">Input language</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Penyanyi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($musics as $music)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $music->judul }}</td>
                    <td>{{ $music->category->nama_kategori }}</td>
                    <td>{{ $music->tahun }}</td>
                    <td>{{ $music->penyanyi }}</td>
                    <td class="text-nowrap">
                        <a href="/music/{{ $music['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/music/delete/{{ $music->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $musics->links() }}
    </div>
@endsection
