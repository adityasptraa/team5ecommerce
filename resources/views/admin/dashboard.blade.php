@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Card: Manage Users -->
      <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-lg font-semibold text-gray-700">Kelola Pengguna</h2>
        <p class="text-sm text-gray-500 mt-2">Lihat, ubah, atau hapus data user.</p>
        <a href="{{ route('admin.users.index') }}" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Pengguna</a>
      </div>

      <!-- Card: Orders -->
      <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-lg font-semibold text-gray-700">Pesanan</h2>
        <p class="text-sm text-gray-500 mt-2">Pantau pesanan yang masuk dan statusnya.</p>
        <a href="{{ route('admin.orders.index') }}" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Pesanan</a>
      </div>

      <!-- Card: Produk -->
      <div class="bg-white shadow-md rounded-2xl p-6">
        <h2 class="text-lg font-semibold text-gray-700">Produk</h2>
        <p class="text-sm text-gray-500 mt-2">Kelola produk yang tersedia di toko.</p>
        <a href="{{ route('admin.products.index') }}" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Kelola Produk</a>
      </div>
    </div>
  </div>
</div>
@endsection
