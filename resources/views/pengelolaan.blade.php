@extends('layouts.app')

@section('title', 'Pengelolaan Stok')

@section('content')
    <h1 class="text-4xl font-extrabold tracking-tight">Pengelolaan Stok</h1>
    <p class="mt-2 text-tinta/70">Semua barang di kedai, {{ $username }}.</p>

    <div class="mt-8 overflow-x-auto rounded-lg border border-garis bg-white">
        <table class="w-full min-w-[34rem] text-left text-sm">
            <thead class="border-b border-garis bg-[#5C4033] text-white">
                <tr>
                    <th class="px-4 py-3 font-semibold">Barang</th>
                    <th class="px-4 py-3 font-semibold">Kategori</th>
                    <th class="px-4 py-3 text-right font-semibold">Stok</th>
                    <th class="px-4 py-3 text-right font-semibold">Minimum</th>
                    <th class="px-4 py-3 font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-garis">
                @forelse ($barang as $item)
                    <tr>
                        <td class="px-4 py-3 font-semibold">{{ $item['nama'] }}</td>
                        <td class="px-4 py-3">{{ $item['kategori'] }}</td>
                        <td class="px-4 py-3 text-right">{{ $item['stok'] }} {{ $item['satuan'] }}</td>
                        <td class="px-4 py-3 text-right">{{ $item['minimum'] }}</td>
                        <td class="px-4 py-3">
                            @if ($item['perlu_restok'])
                                <span class="rounded-full bg-kunyitmuda px-2.5 py-1 text-xs font-semibold text-kunyit">Perlu restok</span>
                            @else
                                <span class="rounded-full bg-pinusmuda px-2.5 py-1 text-xs font-semibold text-pinus">Aman</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-tinta/70">Belum ada barang yang dicatat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
