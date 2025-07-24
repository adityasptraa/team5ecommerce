<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ElectroShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div x-data="dashboardData()" class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-lg border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <i class="fas fa-bolt text-blue-600 text-2xl mr-2"></i>
                        <h1 class="text-xl font-bold text-gray-900">ElectroShop</h1>
                    </div>
                    
                    <!-- User Profile -->
                    <div class="flex items-center space-x-4">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=User&background=3B82F6&color=fff" alt="Profile">
                                <span class="hidden md:block">User Name</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-shopping-cart mr-2"></i>Keranjang
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-history mr-2"></i>Riwayat
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang di Dashboard</h2>
                <p class="text-gray-600">Temukan produk elektronik terbaik dengan harga terbaik</p>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-lg shadow mb-6 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Filter Produk</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select x-model="filters.category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Semua Kategori</option>
                            <option value="smartphone">Smartphone</option>
                            <option value="laptop">Laptop</option>
                            <option value="headphone">Headphone</option>
                            <option value="smartwatch">Smartwatch</option>
                            <option value="camera">Camera</option>
                        </select>
                    </div>
                    
                    <!-- Brand -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                        <select x-model="filters.brand" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Semua Brand</option>
                            <option value="apple">Apple</option>
                            <option value="samsung">Samsung</option>
                            <option value="sony">Sony</option>
                            <option value="asus">ASUS</option>
                            <option value="canon">Canon</option>
                        </select>
                    </div>
                    
                    <!-- Range Harga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Range Harga</label>
                        <select x-model="filters.priceRange" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Semua Harga</option>
                            <option value="0-1000000">< Rp 1.000.000</option>
                            <option value="1000000-5000000">Rp 1.000.000 - 5.000.000</option>
                            <option value="5000000-10000000">Rp 5.000.000 - 10.000.000</option>
                            <option value="10000000-999999999">> Rp 10.000.000</option>
                        </select>
                    </div>
                    
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cari Produk</label>
                        <div class="relative">
                            <input x-model="filters.search" type="text" placeholder="Cari produk..." class="w-full px-3 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 flex justify-end">
                    <button @click="resetFilters()" class="px-4 py-2 text-gray-600 hover:text-gray-800 mr-2">Reset Filter</button>
                    <button @click="applyFilters()" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search mr-2"></i>Terapkan Filter
                    </button>
                </div>
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Produk</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template x-for="product in filteredProducts" :key="product.id">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-12 w-12 rounded-lg object-cover" :src="product.image" :alt="product.name">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900" x-text="product.name"></div>
                                                <div class="text-sm text-gray-500" x-text="product.description"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800" x-text="product.category"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="product.brand"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" x-text="formatPrice(product.price)"></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span :class="product.stock > 10 ? 'text-green-600' : product.stock > 0 ? 'text-yellow-600' : 'text-red-600'" 
                                              class="text-sm font-medium" x-text="product.stock + ' unit'"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="text-yellow-400 mr-1">★</span>
                                            <span class="text-sm text-gray-900" x-text="product.rating"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                        <button class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-shopping-cart"></i> Beli
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium" x-text="filteredProducts.length"></span> dari <span class="font-medium" x-text="products.length"></span> produk
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function dashboardData() {
            return {
                filters: {
                    category: '',
                    brand: '',
                    priceRange: '',
                    search: ''
                },
                products: [
                    {
                        id: 1,
                        name: 'iPhone 15 Pro Max',
                        description: '256GB, Natural Titanium',
                        category: 'Smartphone',
                        brand: 'Apple',
                        price: 18999000,
                        stock: 15,
                        rating: 4.8,
                        image: 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=100&h=100&fit=crop'
                    },
                    {
                        id: 2,
                        name: 'Samsung Galaxy S24 Ultra',
                        description: '512GB, Phantom Black',
                        category: 'Smartphone',
                        brand: 'Samsung',
                        price: 16999000,
                        stock: 8,
                        rating: 4.7,
                        image: 'https://images.unsplash.com/photo-1610792516307-ea4b96b86525?w=100&h=100&fit=crop'
                    },
                    {
                        id: 3,
                        name: 'MacBook Pro M3',
                        description: '14-inch, 16GB RAM, 512GB SSD',
                        category: 'Laptop',
                        brand: 'Apple',
                        price: 32999000,
                        stock: 5,
                        rating: 4.9,
                        image: 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=100&h=100&fit=crop'
                    },
                    {
                        id: 4,
                        name: 'ASUS ROG Strix G15',
                        description: 'RTX 4060, AMD Ryzen 7',
                        category: 'Laptop',
                        brand: 'ASUS',
                        price: 18999000,
                        stock: 12,
                        rating: 4.6,
                        image: 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=100&h=100&fit=crop'
                    },
                    {
                        id: 5,
                        name: 'Sony WH-1000XM5',
                        description: 'Wireless Noise Canceling',
                        category: 'Headphone',
                        brand: 'Sony',
                        price: 4999000,
                        stock: 25,
                        rating: 4.8,
                        image: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&h=100&fit=crop'
                    },
                    {
                        id: 6,
                        name: 'Apple Watch Series 9',
                        description: '45mm GPS + Cellular',
                        category: 'Smartwatch',
                        brand: 'Apple',
                        price: 7999000,
                        stock: 0,
                        rating: 4.7,
                        image: 'https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?w=100&h=100&fit=crop'
                    },
                    {
                        id: 7,
                        name: 'Canon EOS R6 Mark II',
                        description: '24.2MP Full Frame',
                        category: 'Camera',
                        brand: 'Canon',
                        price: 35999000,
                        stock: 3,
                        rating: 4.9,
                        image: 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=100&h=100&fit=crop'
                    },
                    {
                        id: 8,
                        name: 'Samsung Galaxy Buds2 Pro',
                        description: 'True Wireless Earbuds',
                        category: 'Headphone',
                        brand: 'Samsung',
                        price: 2999000,
                        stock: 18,
                        rating: 4.5,
                        image: 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=100&h=100&fit=crop'
                    }
                ],
                get filteredProducts() {
                    let filtered = this.products;
                    
                    if (this.filters.category) {
                        filtered = filtered.filter(p => p.category.toLowerCase() === this.filters.category);
                    }
                    
                    if (this.filters.brand) {
                        filtered = filtered.filter(p => p.brand.toLowerCase() === this.filters.brand);
                    }
                    
                    if (this.filters.priceRange) {
                        const [min, max] = this.filters.priceRange.split('-').map(Number);
                        filtered = filtered.filter(p => p.price >= min && p.price <= max);
                    }
                    
                    if (this.filters.search) {
                        const search = this.filters.search.toLowerCase();
                        filtered = filtered.filter(p => 
                            p.name.toLowerCase().includes(search) || 
                            p.description.toLowerCase().includes(search)
                        );
                    }
                    
                    return filtered;
                },
                formatPrice(price) {
                    return 'Rp ' + price.toLocaleString('id-ID');
                },
                resetFilters() {
                    this.filters = {
                        category: '',
                        brand: '',
                        priceRange: '',
                        search: ''
                    };
                },
                applyFilters() {
                    // Filter sudah otomatis terapply karena menggunakan computed property
                    console.log('Filter applied:', this.filters);
                }
            }
        }
    </script>
</body>
</html>