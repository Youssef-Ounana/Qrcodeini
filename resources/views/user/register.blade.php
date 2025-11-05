@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 py-10 px-4">
    <form action="{{ route('user.store') }}" method="post" class="w-full max-w-md bg-white rounded-xl shadow-2xl p-8 transition-all duration-300 hover:shadow-blue-200">
        @csrf
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-extrabold text-gray-800 font-sans tracking-wide">
                🧑‍💻 Create Your Account
            </h2>
            <p class="text-sm text-gray-500 mt-2">Join us and start generating QR codes!</p>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">👤 Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Your full name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">
            @error('name')
                <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">📧 Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">
            @error('email')
                <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-semibold mb-2">🔒 Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">
            @error('password')
                <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition duration-300 transform hover:scale-105">
                🚀 Register
            </button>
        </div>
    </form>
</div>
@endsection
