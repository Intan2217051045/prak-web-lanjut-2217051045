<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0ff; /* Warna latar belakang yang lebih sesuai dengan tema ungu */
        }
        .container {
            background-color: #e9d5ff; /* Warna ungu muda untuk container */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 500px;
            text-align: center;
        }
        h1 {
            color: #6a0dad; /* Teks judul warna ungu */
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #6a0dad; /* Warna ungu untuk label */
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #d1c4e9; /* Warna ungu pucat */
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #9b5de5; /* Warna ungu terang saat fokus */
            box-shadow: 0 0 5px rgba(155, 93, 229, 0.5);
            outline: none;
        }
        input:hover, select:hover {
            border-color: #7b4397; /* Warna hover ungu lebih gelap */
        }
        button {
            background-color: #6a0dad; /* Warna tombol ungu */
            color: white;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #9b5de5; /* Warna tombol saat hover lebih terang */
            transform: scale(1.05);
        }
        button:active {
            transform: scale(1);
        }
        /* Responsive Design */
        @media (max-width: 500px) {
            .container {
                width: 90%;
                padding: 20px;
            }
            input, select, button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create User</h1>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required>

        <label for="kelas_id">Kelas:</label>
        <select id="kelas_id" name="kelas_id" required>
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br><br>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
</html>