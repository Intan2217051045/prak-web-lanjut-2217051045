@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk styling tabel pengguna dengan tema warna ungu */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background: linear-gradient(90deg, #6a0dad, #9b5de5); /* Gradasi ungu */
        color: white;
    }

    td {
        background-color: #f5f5ff; /* Warna latar belakang terang untuk sel */
    }

    tr:hover {
        background-color: #e0c3fc; /* Efek hover dengan warna ungu lebih terang */
    }

    /* Gaya untuk tombol */
    .btn-primary {
        margin-right: 5px;
        background-color: #6a0dad; /* Warna ungu untuk tombol */
        border-color: #6a0dad;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #9b5de5; /* Warna hover tombol lebih terang */
        border-color: #9b5de5;
    }

    .btn-danger {
        margin-left: 5px;
        background-color: #d16ba5; /* Warna ungu kemerahan untuk tombol hapus */
        border-color: #d16ba5;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #ea86c3; /* Warna hover tombol lebih terang */
        border-color: #ea86c3;
    }

    /* Gaya untuk tampilan tombol aktif */
    button:active {
        transform: scale(0.98);
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection