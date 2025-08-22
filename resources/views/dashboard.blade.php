@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Dashboard Ekspor Menu</h3>
        <p>Silakan ekspor data menu:</p>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary mb-2">←</a>

        <a href="{{ route('menus.export.excel') }}" class="btn btn-success mb-2">Ekspor ke Excel</a>
        <a href="{{ route('menus.export.pdf') }}" class="btn btn-danger mb-2">Ekspor ke PDF</a>

        <hr>

        <h5>Data Menu Saat Ini:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>URL Gambar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                        <td>
                            @if ($menu->image_url)
                                <a href="{{ $menu->image_url }}" target="_blank">Lihat Gambar</a>
                            @else
                                -
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada data menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection