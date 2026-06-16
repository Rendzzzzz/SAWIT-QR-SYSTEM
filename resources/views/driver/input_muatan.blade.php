@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-12 px-4">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold text-[#1F3D2C] mb-6">Update Muatan & Data</h2>

        <form method="POST" action="{{ route('driver.update.muatan') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Plat Nomor Truk</label>
                <input type="text" name="plat_nomor" value="{{ $driver->plat_nomor }}" class="w-full p-3 border rounded focus:ring-2 focus:ring-[#C4E538]">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Berat Muatan Sawit (Kg)</label>
                <input type="number" name="muatan_kg" value="{{ $driver->muatan_kg }}" class="w-full p-3 border rounded focus:ring-2 focus:ring-[#C4E538]">
            </div>
            <button type="submit" class="w-full bg-[#1F3D2C] text-white font-bold py-3 rounded hover:bg-green-800 transition">
                Simpan & Update QR
            </button>
        </form>
    </div>
</div>
@endsection