<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroShop - Toko Elektronik Terpercaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .parallax {
            transform: translateZ(0);
            transition: transform 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-white overflow-x-hidden">
    <div x-data="landingData()" x-init="init()">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 transition-all duration-300" :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg' : 'bg-transparent'">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-10 h-10 gradient-bg rounded-xl flex items-center justify-center">
                                <i class="fas fa-bolt text-white text-xl"></i>
                            </div>
                            <span class="text-xl font-bold" :class="scrolled ? 'text-gray-900' : 'text-white'">ElectroShop</span>
                        </div>
                    </div>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#home" class="hover:text-blue-600 transition-colors" :class="scrolled ? 'text-gray-700' : 'text-white'">Beranda</a>
                        <a href="#products" class="hover:text-blue-600 transition-colors" :class="scrolled ? 'text-gray-700' : 'text-white'">Produk</a>
                        <a href="#about" class="hover:text-blue-600 transition-colors" :class="scrolled ? 'text-gray-700' : 'text-white'">Tentang</a>
                        <a href="#contact" class="hover:text-blue-600 transition-colors" :class="scrolled ? 'text-gray-700' : 'text-white'">Kontak</a>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button class="px-6 py-2 border border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition-all duration-300 font-medium">
                            Login
                        </button>
                        <button class="px-6 py-2 gradient-bg text-white rounded-full hover:opacity-90 transition-all duration-300 font-medium shadow-lg">
                            Daftar
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="min-h-screen gradient-bg hero-pattern relative overflow-hidden">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen flex items-center">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="text-white">
                        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                            Teknologi
                            <span class="block gradient-text bg-gradient-to-r from-yellow-400 to-pink-400">Masa Depan</span>
                            di Genggaman
                        </h1>
                        <p class="text-xl md:text-2xl mb-8 text-gray-200 leading-relaxed">
                            Temukan gadget terbaru dengan teknologi terdepan. Dari smartphone flagship hingga laptop gaming, semua ada di sini dengan harga terbaik.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="px-8 py-4 bg-white text-gray-900 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl transform hover:scale-105">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Mulai Belanja
                            </button>
                            <button class="px-8 py-4 border-2 border-white text-white rounded-full font-bold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300">
                                <i class="fas fa-play mr-2"></i>
                                Lihat Demo
                            </button>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="floating">
                            <img src="https://images.unsplash.com/photo-1512499617640-c74ae3a79d37?w=600&h=600&fit=crop&crop=center" 
                                 alt="Latest iPhone" 
                                 class="w-full max-w-md mx-auto rounded-3xl shadow-2xl transform rotate-6 hover:rotate-0 transition-transform duration-500">
                        </div>
                        <div class="absolute -top-10 -right-10 w-20 h-20 bg-yellow-400 rounded-full pulse-slow opacity-80"></div>
                        <div class="absolute -bottom-10 -left-10 w-16 h-16 bg-pink-400 rounded-full pulse-slow opacity-80"></div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
                <i class="fas fa-chevron-down text-2xl"></i>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Kenapa Pilih <span class="gradient-text">ElectroShop</span>?
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Kami memberikan pengalaman belanja terbaik dengan jaminan kualitas dan pelayanan premium
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="card-hover bg-white p-8 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Garansi Resmi</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Semua produk dilengkapi garansi resmi dari distributor dengan layanan after-sales terpercaya
                        </p>
                    </div>
                    
                    <div class="card-hover bg-white p-8 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-shipping-fast text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Pengiriman Cepat</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Gratis ongkir se-Indonesia dengan pengiriman same-day untuk area Jakarta dan sekitarnya
                        </p>
                    </div>
                    
                    <div class="card-hover bg-white p-8 rounded-2xl shadow-lg text-center">
                        <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-headset text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Support 24/7</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Tim customer service kami siap membantu Anda kapan saja melalui chat, email, atau telepon
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section id="products" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Produk <span class="gradient-text">Terlaris</span>
                    </h2>
                    <p class="text-xl text-gray-600">
                        Koleksi gadget terbaru dengan teknologi terdepan
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <template x-for="product in featuredProducts" :key="product.id">
                        <div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="relative">
                                <img :src="product.image" :alt="product.name" class="w-full h-48 object-cover">
                                <div class="absolute top-4 right-4 px-3 py-1 bg-red-500 text-white text-sm font-bold rounded-full">
                                    <span x-text="product.discount"></span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2" x-text="product.name"></h3>
                                <p class="text-gray-600 text-sm mb-4" x-text="product.description"></p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-2xl font-bold gradient-text" x-text="formatPrice(product.price)"></span>
                                        <span class="text-sm text-gray-500 line-through ml-2" x-text="formatPrice(product.originalPrice)"></span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-400 mr-1">★</span>
                                        <span class="text-sm text-gray-600" x-text="product.rating"></span>
                                    </div>
                                </div>
                                <button class="w-full mt-4 px-6 py-3 gradient-bg text-white rounded-xl font-medium hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-cart-plus mr-2"></i>
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
                
                <div class="text-center mt-12">
                    <button class="px-8 py-4 gradient-bg text-white rounded-full font-bold text-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                        Lihat Semua Produk
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-20 gradient-bg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                    <div>
                        <div class="text-4xl md:text-5xl font-black mb-2">50K+</div>
                        <div class="text-lg opacity-90">Pelanggan Puas</div>
                    </div>
                    <div>
                        <div class="text-4xl md:text-5xl font-black mb-2">1000+</div>
                        <div class="text-lg opacity-90">Produk Tersedia</div>
                    </div>
                    <div>
                        <div class="text-4xl md:text-5xl font-black mb-2">24/7</div>
                        <div class="text-lg opacity-90">Customer Support</div>
                    </div>
                    <div>
                        <div class="text-4xl md:text-5xl font-black mb-2">99%</div>
                        <div class="text-lg opacity-90">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gray-900">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Siap untuk Upgrade Gadget Anda?
                </h2>
                <p class="text-xl text-gray-300 mb-8">
                    Bergabunglah dengan ribuan pelanggan yang telah merasakan pengalaman belanja terbaik di ElectroShop
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="px-8 py-4 gradient-bg text-white rounded-full font-bold text-lg hover:opacity-90 transition-all duration-300 shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </button>
                    <button class="px-8 py-4 border-2 border-white text-white rounded-full font-bold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-10 h-10 gradient-bg rounded-xl flex items-center justify-center">
                                <i class="fas fa-bolt text-white text-xl"></i>
                            </div>
                            <span class="text-xl font-bold">ElectroShop</span>
                        </div>
                        <p class="text-gray-400">
                            Toko elektronik terpercaya dengan koleksi gadget terlengkap dan teknologi terdepan.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4">Produk</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition-colors">Smartphone</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Laptop</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Headphone</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Smartwatch</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4">Layanan</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition-colors">Garansi</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Pengiriman</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Support</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Trade-in</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4">Kontak</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><i class="fas fa-phone mr-2"></i>+62 21 1234 5678</li>
                            <li><i class="fas fa-envelope mr-2"></i>info@electroshop.id</li>
                            <li><i class="fas fa-map-marker-alt mr-2"></i>Jakarta, Indonesia</li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 ElectroShop. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function landingData() {
            return {
                scrolled: false,
                featuredProducts: [
                    {
                        id: 1,
                        name: 'iPhone 15 Pro',
                        description: 'Teknologi A17 Pro dengan performa maksimal',
                        price: 16999000,
                        originalPrice: 18999000,
                        discount: '-10%',
                        rating: 4.9,
                        image: 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=300&fit=crop'
                    },
                    {
                        id: 2,
                        name: 'MacBook Air M3',
                        description: 'Laptop super tipis dengan chip M3 terbaru',
                        price: 18999000,
                        originalPrice: 21999000,
                        discount: '-14%',
                        rating: 4.8,
                        image: 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&h=300&fit=crop'
                    },
                    {
                        id: 3,
                        name: 'Sony WH-1000XM5',
                        description: 'Headphone noise canceling terbaik',
                        price: 4999000,
                        originalPrice: 5999000,
                        discount: '-17%',
                        rating: 4.7,
                        image: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=300&fit=crop'
                    },
                    {
                        id: 4,
                        name: 'Apple Watch Ultra',
                        description: 'Smartwatch premium untuk lifestyle aktif',
                        price: 12999000,
                        originalPrice: 14999000,
                        discount: '-13%',
                        rating: 4.6,
                        image: 'https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?w=400&h=300&fit=crop'
                    }
                ],
                init() {
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 50;
                    });
                },
                formatPrice(price) {
                    return 'Rp ' + price.toLocaleString('id-ID');
                }
            }
        }
    </script>
</body>
</html>