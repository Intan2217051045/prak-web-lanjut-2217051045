<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\Kelas;
use App\Models\UserModel;


class UserController extends Controller
{

    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    // Menampilkan form untuk create user
    public function create()
    {
        $data = [
            'kelas' => Kelas::all(),
        ];

        return view('create_user', $data);
    }

    // Menyimpan data user yang dikirim dari form
    public function store(StoreUserRequest $request)
    {   
        
        // Mengambil data yang dikirim dari form menggunakan input
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        // Validasi data
        $validatedData = $request->validated();

        // Menyimpan data user ke database
        $user = UserModel::create($validatedData);

        // Memuat data kelas untuk user
        $user->load('kelas');
        // Mengirim data ke view profile
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);

        // Redirect ke halaman list user dengan pesan sukses
        return redirect()->route('user.list')->with('success', 'User berhasil ditambahkan!');
    }
}