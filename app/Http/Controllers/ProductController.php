<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::paginate(5); // Ganti 5 dengan jumlah item per halaman
        return view('admin.dashboard', compact('products'));
    }
    public function destroy($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus');
        }

    public function create()
        {                
            return view('admin.create'); // Pastikan file Blade ini ada
        }

    // Menyimpan data produk
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:100',
            'description' => 'required|string|max:250',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('img', 'public');
        }
        // Simpan ke database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img' => $imagePath,
        ]);

        // Redirect ke halaman admin dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:100',
            'description' => 'required|string|max:250',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 

        $imagePath = null;

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('img', 'public');
        }

        // $product = Product::findOrFail($id);
        // $product->update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        //     'img' => $imagePath,
        // ]);

        

        $product = Product::findOrFail($id);

    // Siapkan data update
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ];

        // Kalau ada file gambar baru, update gambar
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $data['img'] = $imagePath;
        }

        // Jika tidak ada file baru, field 'img' tidak diubah
        $product->update($data);



            return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil diupdate.');
        }

}
?>
