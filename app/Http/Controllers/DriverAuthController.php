<?php

namespace App\Http\Controllers;

use App\Services\SupabaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverAuthController extends Controller
{
    protected $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    // Halaman Login Driver
    public function showLogin()
    {
        return view('driver.login');
    }

    // Proses Login Driver
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $driver = $this->supabase->getDriverByUsername($request->username);

        if ($driver && Hash::check($request->password, $driver['password'])) {
            session(['driver_id' => $driver['id']]);
            return redirect()->route('driver.dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    // Dashboard Driver
    public function dashboard()
    {
        $driverId = session('driver_id');
        if (!$driverId) {
            return redirect()->route('driver.login');
        }

        $driver = $this->supabase->getDriver($driverId);
        
        $qrData = json_encode([
            'id' => $driver['id'],
            'nama' => $driver['nama_driver'],
            'plat' => $driver['plat_nomor'],
            'muatan' => $driver['muatan_kg'],
        ]);

        return view('driver.dashboard', compact('driver', 'qrData'));
    }

    // Halaman Input Muatan
    public function showInputForm()
    {
        $driverId = session('driver_id');
        if (!$driverId) {
            return redirect()->route('driver.login');
        }

        $driver = $this->supabase->getDriver($driverId);
        return view('driver.input_muatan', compact('driver'));
    }

    // Simpan Data Muatan
    public function storeMuatan(Request $request)
    {
        $driverId = session('driver_id');
        $driver = $this->supabase->getDriver($driverId);

        $request->validate([
            'muatan_kg' => 'required|integer|min:1',
            'plat_nomor' => 'required',
        ]);

        // Update driver data di Supabase
        $this->supabase->updateDriver($driverId, [
            'muatan_kg' => $request->muatan_kg,
            'plat_nomor' => $request->plat_nomor,
            'is_verified' => false,
        ]);

        return redirect()->route('driver.dashboard')->with('success', 'Data muatan berhasil diperbarui!');
    }

    // Logout
    public function logout()
    {
        session()->forget('driver_id');
        return redirect()->route('driver.login');
    }
}