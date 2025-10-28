@extends('layouts.app')

@section('title')
    Create Qrcode
@endsection

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-100 to-gray-300">
    <form action="{{ route('qrcodes.store') }}" method="POST" class="w-full max-w-lg bg-white rounded-xl shadow-2xl p-8 transition-all duration-300 hover:shadow-blue-200">
        @csrf
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-extrabold text-gray-800 font-sans tracking-wide">
                🧾 Generate Your QR Code
            </h2>
            <p class="text-sm text-gray-500 mt-2">Enter the content you'd like to encode</p>
        </div>

        <div class="mb-6">
            <label for="content" class="block text-gray-700 font-semibold mb-2">
                ✍️ Content
            </label>
            <textarea name="content" id="content" rows="5" placeholder="Type your content here..." class="resize-none w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">{{ old('content') }}</textarea>
            @error('content')
                <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-md transition duration-300 transform hover:scale-105">
                🚀 Create QR Code
            </button>
        </div>
    </form>
</div>
@endsection
