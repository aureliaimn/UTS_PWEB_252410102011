@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid items-center gap-6 md:grid-cols-2">
        <div>
            <h1 class="text-4xl font-extrabold tracking-tight md:text-5xl">Halo, {{ $username }}</h1>
            <p class="mt-2 text-tinta/70">Ringkasan stok kedai hari ini.</p>
        </div>
        <img src="{{ asset('images/dashboard.png') }}" alt="Suasana Teras Kopi" class="h-44 w-full rounded-lg object-cover md:h-52">
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-3">
        @foreach ($ringkasan as $item)
            <div class="rounded-lg border border-garis bg-white p-5 shadow-sm">
                <p class="text-4xl font-extrabold">{{ $item['nilai'] }}</p>
                <p class="mt-1 text-sm text-tinta/70">{{ $item['label'] }}</p>
            </div>
        @endforeach
    </div>

    <h2 class="mt-10 text-xl font-semibold">Perlu dibeli lagi</h2>
    <ul class="mt-3 divide-y divide-garis border-y border-garis">
        @forelse ($perluRestok as $barang)
            <li class="flex flex-wrap items-center justify-between gap-x-4 gap-y-1 py-3">
                <span>{{ $barang['nama'] }}</span>
                <span class="text-sm text-tinta/70">
                    <span class="font-semibold text-kunyit">{{ $barang['stok'] }} {{ $barang['satuan'] }}</span>
                    tersisa
                </span>
            </li>
        @empty
            <li class="py-3 text-tinta/70">Semua stok masih aman.</li>
        @endforelse
    </ul>

    <div class="mt-6 text-center">
    <a href="{{ route('pengelolaan', ['username' => $username]) }}"
       class="inline-block rounded-md bg-pinus px-4 py-2.5 font-semibold text-white hover:bg-pinus/90">
        Kelola stok
    </a>
</div>
@endsection