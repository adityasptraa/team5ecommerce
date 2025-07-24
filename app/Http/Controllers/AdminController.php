<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index() {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function create() {
        return view('admin.admins.create');
    }

    public function store(Request $request) {
        Admin::create($request->all()); // ⚠️ Pastikan mass assignment aman
        return redirect()->route('admins.index');
    }

    public function edit($id) {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id) {
        $admin = Admin::findOrFail($id);
        $admin->update($request->all()); // ⚠️ Pastikan hanya field yang diperbolehkan
        return redirect()->route('admins.index');
    }

    public function destroy($id) {
        Admin::destroy($id);
        return redirect()->route('admins.index');
    }
}
