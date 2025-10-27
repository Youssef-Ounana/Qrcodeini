@extends('layouts.app')


@section('title')
    Qrcodes
@endsection

@section('content')
    <a href="{{ route('qrcodes.create') }}" class="">
        <button class="shadow-[0_4px_14px_0_rgb(0,118,255,39%)] hover:shadow-[0_6px_20px_rgba(0,118,255,23%)] hover:bg-[rgba(0,118,255,0.9)] px-8 py-2 bg-[#0070f3] rounded-md text-white font-light transition duration-200 ease-linear">
            Create
        </button>
    </a>
@endsection
