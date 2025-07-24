<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Laptop Gaming ROG',
                'description' => 'Powerful gaming laptop with high-end specifications for ultimate gaming experience.',
                'price' => 15000000,
                'stock' => 10,
                'image' => 'products/laptop-gaming.jpg'
            ],
            [
                'name' => 'Smartphone Premium',
                'description' => 'Latest smartphone with advanced camera features and powerful processor.',
                'price' => 8000000,
                'stock' => 15,
                'image' => 'products/smartphone.jpg'
            ],
            [
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation feature.',
                'price' => 2000000,
                'stock' => 20,
                'image' => 'products/headphones.jpg'
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smartwatch with health monitoring capabilities.',
                'price' => 3000000,
                'stock' => 12,
                'image' => 'products/smartwatch.jpg'
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse perfect for gaming and office work.',
                'price' => 500000,
                'stock' => 25,
                'image' => 'products/mouse.jpg'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
