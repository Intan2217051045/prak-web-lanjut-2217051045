<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-picture img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            width: 200px;
        }

        .info-box {
            background-color: #e0e0e0;
            color: #000;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Foto Profil -->
        <div class="profile-picture">
            <img src="/img/Dewi Intan Nabila_Creative_Anggota.jpg" alt="Profile Picture">
        </div>
        
        <!-- Informasi Profil -->
        <div class="profile-info">
            <!-- Nama -->
            <div class="info-box">Nama: {{ $nama ?? 'Nama tidak ditemukan' }}</div>
            
            <!-- Kelas -->
            <div class="info-box">Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
            
            <!-- NPM -->
            <div class="info-box">NPM: {{ $npm ?? 'NPM tidak ditemukan' }}</div>
        </div>
    </div>
</body>
</html>