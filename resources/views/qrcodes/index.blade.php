@extends('layouts.app')

@section('title')
    Qrcodes
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-10 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📋 QR Code List</h1>
            <a href="{{ route('qrcodes.create') }}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-lg transition duration-300 ease-in-out">
                    ➕ Create New
                </button>
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">📝 Content</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">📷 QR Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($qrcodes as $qrcode)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $qrcode->content }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset($qrcode->qrcode_path) }}" alt="QR Code" class="w-20 h-20 object-contain rounded-md border border-gray-300">
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset($qrcode->qrcode_path) }}" download class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition duration-200">Download</a>
                                <form action="{{ route('qrcodes.destroy', $qrcode->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this QR code?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition duration-200">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No QR codes found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
