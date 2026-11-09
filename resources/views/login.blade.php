@extends('layouts.app')

@section('title', 'Masuk')
@section('tanpa-navbar', 'ya')

@section('content')
    <div class="grid gap-10 md:min-h-[60vh] md:grid-cols-2 md:items-center">
        <div>
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Teras Kopi" class="h-16 w-16 md:h-20 md:w-20">
                <h1 class="text-6xl font-extrabold leading-[0.95] tracking-tight md:text-7xl">Teras<br>Kopi</h1>
            </div>
            <p class="mt-5 max-w-sm text-lg text-tinta/70">
                Pengelolaan stok bahan dan kemasan kedai, dan lihat mana yang perlu dibeli lagi!
            </p>
        </div>

        <form method="POST" action="{{ route('login.process') }}" class="space-y-4 rounded-lg border border-garis bg-white p-6">
            @csrf
            <div>
                <label for="username" class="mb-1 block text-sm font-semibold">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" autocomplete="username"
                       class="w-full rounded-md border border-garis px-3 py-2 focus:border-pinus focus:outline-none focus:ring-2 focus:ring-pinus/30">
                @error('username')
                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                    class="w-full rounded-md bg-pinus px-4 py-2.5 font-semibold text-white hover:bg-pinus/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-pinus focus-visible:ring-offset-2">
                Masuk
            </button>
        </form>
    </div>
@endsection