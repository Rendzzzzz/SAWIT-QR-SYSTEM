@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-[#1F3D2C]">Dashboard Driver</h1>
        <a href="{{ route('driver.logout') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
    </div>

    <!-- Info Driver -->
    <div class="bg-white p-6 rounded-2xl shadow-md mb-8">
        <h2 class="text-xl font-semibold mb-4">Halo, {{ $driver->nama_driver }}</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-500 text-sm">Plat Nomor</p>
                <p class="font-bold">{{ $driver->plat_nomor }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Muatan Saat Ini</p>
                <p class="font-bold">{{ number_format($driver->muatan_kg) }} Kg</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Status</p>
                <span class="px-2 py-1 rounded text-xs {{ $driver->is_verified ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ $driver->is_verified ? 'Terverifikasi' : 'Menunggu Verifikasi Admin' }}
                </span>
            </div>
        </div>
    </div>

    <!-- QR Code Section -->
    <div class="bg-white p-6 rounded-2xl shadow-md text-center">
        <h3 class="text-lg font-semibold mb-4">QR Code Anda</h3>
        <div class="flex justify-center mb-4">
            <div class="border-4 border-[#1F3D2C] p-2 rounded-lg bg-white">
                <img src="{{ route('qr.generate', $driver->id) }}" alt="QR Code" class="w-48 h-48">
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-6">Tunjukkan QR ini saat masuk gerbang pabrik.</p>
        
        <a href="{{ route('driver.input.muatan') }}" class="inline-block bg-[#C4E538] text-[#1F3D2C] font-bold px-6 py-2 rounded hover:bg-[#A9C92F] transition">
            Update Data Muatan
        </a>
    </div>

</div>
@endsection