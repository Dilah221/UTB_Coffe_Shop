@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Tambah Menu Baru</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Menu</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp)</label>
                <input type="number" name="price" class="form-control" id="price" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">URL Gambar</label>
                <input type="text" name="image_url" class="form-control" id="image_url" placeholder="https://...">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('menus.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
