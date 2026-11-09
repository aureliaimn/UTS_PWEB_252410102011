<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function dataStok(): array
    {
        return [
            ['nama' => 'Biji kopi arabika', 'kategori' => 'Bahan baku', 'stok' => 18, 'minimum' => 10, 'satuan' => 'kg'],
            ['nama' => 'Biji kopi robusta', 'kategori' => 'Bahan baku', 'stok' => 6, 'minimum' => 10, 'satuan' => 'kg'],
            ['nama' => 'Susu UHT', 'kategori' => 'Bahan baku', 'stok' => 24, 'minimum' => 20, 'satuan' => 'liter'],
            ['nama' => 'Gula aren cair', 'kategori' => 'Bahan baku', 'stok' => 9, 'minimum' => 8, 'satuan' => 'liter'],
            ['nama' => 'Sirup vanila', 'kategori' => 'Perasa', 'stok' => 3, 'minimum' => 4, 'satuan' => 'botol'],
            ['nama' => 'Cup 12 oz', 'kategori' => 'Kemasan', 'stok' => 340, 'minimum' => 200, 'satuan' => 'pcs'],
            ['nama' => 'Sedotan kertas', 'kategori' => 'Kemasan', 'stok' => 120, 'minimum' => 150, 'satuan' => 'pcs'],
            ['nama' => 'Filter kertas V60', 'kategori' => 'Peralatan', 'stok' => 45, 'minimum' => 30, 'satuan' => 'lembar'],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate(
            ['username' => 'required|string|max:50'],
            ['username.required' => 'Username wajib diisi.']
        );

        return redirect()->route('dashboard', ['username' => $request->username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');
        $stok = collect($this->dataStok());

        $perluRestok = $stok
            ->filter(fn ($barang) => $barang['stok'] <= $barang['minimum'])
            ->values()
            ->all();

        $ringkasan = [
            ['label' => 'Jenis barang', 'nilai' => $stok->count()],
            ['label' => 'Perlu restok', 'nilai' => count($perluRestok)],
            ['label' => 'Kategori', 'nilai' => $stok->pluck('kategori')->unique()->count()],
        ];

        return view('dashboard', compact('username', 'ringkasan', 'perluRestok'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');

        $barang = array_map(function ($item) {
            $item['perlu_restok'] = $item['stok'] <= $item['minimum'];
            return $item;
        }, $this->dataStok());

        return view('pengelolaan', compact('username', 'barang'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');

        $biodata = [
            'Nama' => $username,
            'NIM' => '252410102011',
            'Kelas' => 'C',
            'Program studi' => 'Teknologi Informasi',
            'Fakultas' => 'Ilmu Komputer',
            'Universitas' => 'Universitas Jember',
        ];

        return view('profile', compact('username', 'biodata'));
    }
}
