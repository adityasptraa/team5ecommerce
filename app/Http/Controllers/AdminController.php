<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function create() {
        return view('admin.admins.create');
    }

    public function store(AdminRequest $request) {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        Admin::create($validatedData);
        return redirect()->route('admins.index')->with('success', 'Admin created successfully');
    }

    public function edit($id) {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(AdminRequest $request, $id) {
        $admin = Admin::findOrFail($id);
        $validatedData = $request->validated();
        
        if ($validatedData['password'] ?? false) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        
        $admin->update($validatedData);
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully');
    }

    public function destroy($id) {
        Admin::destroy($id);
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully');
    }
}
