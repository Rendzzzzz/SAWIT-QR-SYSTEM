@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#E8EAE3]">
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full">
        <h2 class="text-2xl font-bold text-[#1F3D2C] mb-6 text-center">Login Driver Sawit</h2>
        
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('driver.login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" name="username" required class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#C4E538]">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#C4E538]">
            </div>
            <button type="submit" class="w-full bg-[#1F3D2C] text-white font-bold py-3 rounded hover:bg-green-800 transition">Masuk</button>
        </form>
    </div>
</div>
@endsection