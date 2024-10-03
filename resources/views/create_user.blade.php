<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a0dad, #c850c0); /* Gradasi ungu */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px); /* Efek blur transparan */
            text-align: center;
            width: 350px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
            color: #fff;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #fff;
            text-align: left;
        }

        input[type="text"] {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 16px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: all 0.3s ease;
        }

        input[type="text"]::placeholder {
            color: #ddd;
        }

        input[type="text"]:focus {
            border: 2px solid #fff;
            background-color: rgba(255, 255, 255, 0.3);
        }

        input[type="submit"] {
            background-color: #ff4081;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff5e99;
            transform: translateY(-3px); /* Efek hover mengangkat */
        }

        input[type="submit"]:active {
            transform: translateY(0); /* Efek klik mengembalikan posisi */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Halaman User</h1>
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama">

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm"  placeholder="Masukkan NPM">

            <label for="kelas">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach($kelas as $kelasItem)
                <option value="{{$kelasItem->id }}">{{$kelasItem->nama_kelas}}</option>
                @endforeach
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>