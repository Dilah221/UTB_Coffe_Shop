@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Menu: {{ $menu->name }}</h3>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Menu</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ $menu->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $menu->price }}" required>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">URL Gambar</label>
            <input type="text" name="image_url" class="form-control" id="image_url" value="{{ $menu->image_url }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
