@extends('/admin/layout') <!-- Ganti sesuai layout utama kamu -->

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Produk</h2>

    <!-- Tampilkan pesan error -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Produk -->
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-gray-700 font-semibold">Nama Produk</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="price" class="block text-gray-700 font-semibold">Harga</label>
            <input type="text" name="price" id="price" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" value="{{ old('price') }}" required>
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-semibold">Deskripsi</label>
            <input type="text" name="description" id="description" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" value="{{ old('description') }}" required>
        </div>

        <div>
            <label for="img" class="block text-gray-700 font-semibold">Gambar</label>
            <input type="file" name="img" id="img" class="w-full border border-gray-300 rounded px-4 py-2 mt-1"required>
        </div>

        <div class="text-right">
            <a href="{{ route('product.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
