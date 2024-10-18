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

    /* Gaya untuk teks List Data */
    .page-title {
        font-size: 28px;
        color: #6a0dad; /* Warna ungu */
        text-align: center;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Gaya untuk tombol Tambah Pengguna Baru */
    .btn-add-user {
        display: inline-block;
        padding: 10px 20px;
        background-color: #6a0dad; /* Warna ungu */
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 6px;
        transition: background-color 0.3s ease;
        margin-bottom: 20px;
    }

    .btn-add-user:hover {
        background-color: #9b5de5; /* Warna hover ungu lebih terang */
    }

    /* Gaya untuk tombol View, Edit, dan Delete */
    .btn-view, .btn-edit, .btn-delete {
        padding: 8px 15px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 6px;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-view {
        background-color: #5e60ce; /* Warna ungu tua untuk tombol View */
    }

    .btn-view:hover {
        background-color: #7b2cbf; /* Warna hover ungu lebih terang */
        transform: scale(1.05); /* Efek hover membesar */
    }

    .btn-edit {
        background-color: #4a00e0; /* Warna ungu tua untuk tombol Edit */
        margin-left: 5px;
    }

    .btn-edit:hover {
        background-color: #7209b7; /* Warna hover ungu lebih terang */
        transform: scale(1.05); /* Efek hover membesar */
    }

    .btn-delete {
        background-color: #d16ba5; /* Warna ungu kemerahan untuk tombol Delete */
        margin-left: 5px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #ea86c3; /* Warna hover ungu lebih terang */
        transform: scale(1.05); /* Efek hover membesar */
    }

    /* Gaya untuk tombol saat di-klik */
    button:active, .btn-add-user:active, .btn-view:active, .btn-edit:active, .btn-delete:active {
        transform: scale(0.98);
    }

    /* Gaya untuk kotak action tombol */
    .action-buttons {
        display: flex;
        gap: 5px;
    }
</style>


<br>
<div class="page-title">List Data</div>

<!-- Tombol Tambah Pengguna Baru -->
<a href="{{ route('users.create') }}" class="btn-add-user mb-3">Tambah Pengguna Baru</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Foto</th>
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
                    @if($user->foto)
                        <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" alt="Foto Pengguna" width="100">
                    @else
                        <span>Foto tidak tersedia</span>
                    @endif
                </td>
                <td>
                    <div class="action-buttons">
                        <!-- Tombol View sesuai instruksi pada gambar -->
                        <a href="{{ route('users.show', $user->id) }}" class="btn-view">View</a>

                        <!-- Tombol Edit -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection