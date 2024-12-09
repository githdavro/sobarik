<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'in:mahasiswa,dosen'], // Validasi tipe pengguna
        ]);

        // Validasi tambahan untuk Mahasiswa atau Dosen
        if ($request->user_type === 'mahasiswa') {
            $validatedData['nim'] = $request->validate([
                'nim' => ['required', 'string', 'max:20', 'unique:mahasiswas']
            ])['nim'];
        } elseif ($request->user_type === 'dosen') {
            $validatedData['nip'] = $request->validate([
                'nip' => ['required', 'string', 'max:20', 'unique:dosens']
            ])['nip'];
        }

        // Buat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Simpan data tambahan ke tabel masing-masing
        if ($request->user_type === 'mahasiswa') {
            Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => $validatedData['nim'],
                'nama' => $validatedData['name'],
                'email' => $validatedData['email'],
                // Tambahkan field lainnya jika diperlukan
            ]);
        } elseif ($request->user_type === 'dosen') {
            Dosen::create([
                'user_id' => $user->id,
                'nip' => $validatedData['nip'],
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                // Tambahkan field lainnya jika diperlukan
            ]);
        }

        // Event dan login
        event(new Registered($user));
        Auth::login($user);

        return redirect(route('login', absolute: false));
    }
}
