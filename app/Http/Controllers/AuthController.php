<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function registershow(){
        return view('auth.register');
    }

    public function register(Request $request)
    {

        // dd($request->all());
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'selfie' => 'required|image', // Maksimal 2MB
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'address' => 'required|string|max:255',
            'level' => 'required|string',
            'organitation' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15|unique:users,phone',
            'job' => 'string|max:255',
            'password' => 'required|string|min:8',
            'house_photo' => 'nullable|image', // Maksimal 2MB, opsional
        ], [
            'selfie.required' => 'Foto selfie diperlukan.',
            'selfie.image' => 'File yang diunggah harus berupa gambar.',
            'selfie.max' => 'Foto selfie tidak boleh lebih dari 2MB.',
            'name.required' => 'Nama diperlukan.',
            'username.required' => 'Username diperlukan.',
            'username.unique' => 'Username sudah tersedia.',
            'address.required' => 'Alamat diperlukan.',
            'level.required' => 'Level diperlukan.',
            'phone.required' => 'Nomor telepon diperlukan.',
            'phone.unique' => 'Nomor telepon sudah pernah digunakan.',
            'job.required' => 'Pekerjaan diperlukan.',
            'password.required' => 'Password diperlukan.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'house_photo.image' => 'File yang diunggah harus berupa gambar.',
            'house_photo.max' => 'Foto rumah tidak boleh lebih dari 2MB.',
        ]);
    
        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Upload dan simpan path gambar selfie ke folder public/assets/img/user
        $selfiePath = $request->file('selfie')->storeAs(
            'assets/img/user',
            $request->username . '.' . $request->file('selfie')->getClientOriginalExtension(),
            'public'
        );
    
        // Jika level adalah "Penerima" dan foto rumah diunggah, simpan path gambar foto rumah
        $housePhotoPath = null;
        if ($request->level === 'Penerima' && $request->hasFile('house_photo')) {
            $housePhotoPath = $request->file('house_photo')->storeAs(
                'assets/img/house',
                $request->username . '_house.' . $request->file('house_photo')->getClientOriginalExtension(),
                'public'
            );
        }
    
        // Mengatur status aktif berdasarkan level pengguna
        $isActive = $request->level === 'Pendonasi';
    
        // Simpan data ke database
        User::create([
            'selfie' => $selfiePath,                 // Path selfie di database
            'name' => $request->name,
            'username' => $request->username,
            'address' => $request->address,
            'level' => $request->level,
            'organitation' => $request->organitation ?? null, // Organisasi (opsional)
            'phone' => $request->phone,
            'job' => $request->job,
            'house_photo' => $housePhotoPath,        // Path foto rumah (opsional untuk "Penerima")
            'password' => Hash::make($request->password), // Hash password
            'is_active' => $isActive, // Status aktif, true jika Pendonasi
        ]);
    
        // Redirect atau berikan respons sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Cek kredensial dan status aktif
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user->is_active) {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Akun Anda belum aktif. Silakan tunggu persetujuan admin.',
                ]);
            }
    
            return redirect()->intended('/dashboard'); // Ganti 'home' dengan route yang sesuai
        }
    
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request){
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
