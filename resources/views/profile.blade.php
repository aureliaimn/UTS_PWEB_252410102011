@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <h1 class="text-4xl font-extrabold tracking-tight">Profil</h1>
    <p class="mt-2 text-tinta/70">Masuk sebagai <span class="font-semibold text-tinta">{{ $username }}</span></p>

    <dl class="mt-8 divide-y divide-garis rounded-lg border border-garis bg-white">
        @foreach ($biodata as $label => $isi)
            <div class="grid gap-1 px-4 py-3 sm:grid-cols-3">
                <dt class="text-sm text-tinta/70">{{ $label }}</dt>
                <dd class="font-semibold sm:col-span-2">{{ $isi }}</dd>
            </div>
        @endforeach
    </dl>
@endsection
