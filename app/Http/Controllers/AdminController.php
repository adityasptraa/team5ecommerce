<?php

// namespace App\Http\Controllers\AdminController;

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index() {
        $admins = AdminController::all();
        return view('admin.dashboard', compact('admins'));
    }

    public function create() {
        // return view('admin.admins.create');
        return redirect()->route('admin.Show');
    }

    public function show()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request) {
        AdminController::create($request->all()); // ⚠️ Pastikan mass assignment aman
        return redirect()->route('admins.index');
    }

    public function edit($id) {
        $admin = AdminController::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id) {
        $admin = AdminController::findOrFail($id);
        $admin->update($request->all()); // ⚠️ Pastikan hanya field yang diperbolehkan
        return redirect()->route('admins.index');
    }

    public function destroy($id) {
        AdminController::destroy($id);
        return redirect()->route('admins.index');
    }
}
