<h3>Daftar Menu UTB Coffee</h3>
<table border="1" cellspacing="0" cellpadding="8">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->description }}</td>
                <td>Rp {{ number_format($menu->price) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
