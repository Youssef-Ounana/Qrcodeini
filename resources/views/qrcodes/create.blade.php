@extends('layouts.app')


@section('title')
    Create Qrcode
@endsection

@section('content')
    <div class=" justify-items-center mt-10 ">
        <form action="{{ route('qrcodes.store') }}" class="rounded px-8 pt-6 pb-8 mb-4 shadow-xl bg-gray-50" method="post">
            @csrf
            <h2 class="text-lg font-mono font-bold">
                Create a new Qrcode
            </h2>

            <div class="mb-4 mt-5">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Content
                </label>
                <textarea name="content" id="content" cols="30" rows="5" class="hadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
                @error('content')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"> 
                        <strong>
                            {{$message}}
                        </strong>
                    </div>
                @enderror
                <button type="submit">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection