@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Menu UTB Coffee</h2>
    <div class="text-end">
        <a href="{{ route('menus.create') }}" class="btn btn-success">+ Tambah Menu</a>
    </div>

    <div class="row">
        @foreach ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $menu->image_url ?? 'https://via.placeholder.com/300x200.png?text=Menu+Image' }}" 
                         class="card-img-top" alt="Menu Image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <div class="mt-auto">
                            <p class="fw-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
