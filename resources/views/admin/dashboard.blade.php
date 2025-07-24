<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sawah Ecommerce')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-black">
    <div class="flex min-h-screen">
        <aside class="w-64 flex-shrink-0 bg-gray-900 p-6">
            <h1 class="text-2xl font-bold text-white mb-12">Welcome To<br>Admin Dashboard</h1>
            <nav class="space-y-4">
                <a href="{{--{{ route('admin.Show') }} --}}" class="flex items-center px-4 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                    <span>Dashboard</span>
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col bg-black">
            <header class="flex justify-end items-center p-4 border-b border-gray-800">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-800">
                        <span class="relative inline-block">
                            <svg class="h-8 w-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-gray-900"></span>
                        </span>
                        {{-- <span class="text-sm font-medium text-white">Welcome, {{ Auth::user()->name }}</span> --}}
                    </button>
                    <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-20">
                        <a href=" {{-- {{ route('account.settings', ['id' => Auth::id()]) }} --}}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Account Settings</a>
                        <a href="{{-- {{ route('security') }} --}}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Security</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Verification</a>
                        <a href="{{--{{ route('settings') }} --}}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Settings</a>
                        <div class="border-t border-gray-700 my-1"></div>
                        <a href="{{-- {{ route('logout') }} --}}" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700">Log out</a>
                    </div>
                </div>
            </header>
            
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold text-white mb-6 mt-6">Daftar Produk</h1>

                <!-- Header + Body Produk -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 bg-slate-300 p-10 rounded-2xl">

                    <!-- Header Kolom -->
                    <div class="w-full mx-auto">
                        <h3 class="text-sm font-medium text-gray-500">Nama Produk</h3>
                    </div>
                    <div class="w-full mx-auto">
                        <h3 class="text-sm font-medium text-gray-500 text-center">Kategori</h3>
                    </div>
                    <div class="w-full  text-right mr-10">
                        <h3 class="text-sm font-medium text-gray-500">Aksi</h3>
                    </div>

                    <!-- Data Produk -->
                    @foreach ($products as $product)
                        <!-- Nama Produk -->
                        <div class="w-full mt-4  p-4 ">
                            <p class="text-lg text-gray-900">{{ $product->name }}</p>
                        </div>

                        <!-- Kategori -->
                        <div class="w-full mt-4  p-4  text-center">
                            <p class="text-lg text-gray-900">{{ $product->category }}</p>
                        </div>

                        <!-- Aksi -->
                        <div class="mt-4  p-4  text-right space-x-2">
                            <a href="{{ route('product.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
            {{-- <main class="flex-1 p-6 md:p-8 bg-gray-100 text-gray-800">
                @yield('content')
            </main> --}}
        </div>
    </div>
</body>
</html>