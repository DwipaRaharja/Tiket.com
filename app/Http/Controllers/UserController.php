<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate('5');
        return view('admin.manage_users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'role.required' => 'Role harus dipilih',
        ]);

        User::create($validate);
        return redirect('/admin/manage-user')->with('success', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.manage_users.detail', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.manage_users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email' => Rule::unique('users', 'email')->ignore($id),
            ],
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'role.required' => 'Role harus dipilih',
        ]);
        $user = User::findOrFail($id);
        $user->update($validate);
        return redirect('/admin/manage-user')->with('success', 'Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users, $id)
    {
        $users::findOrFail($id)->delete();
        return redirect('/admin/manage-user')->with('success', 'Data berhasil dihapus');
    }

    public function cekData(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'email_user' => 'required',
        ], [
            'nama_user.required' => 'Nama user kosong',
            'email_user.required' => 'Email user kosong',
        ]);

        $user = User::where('name', $request->nama_user)
            ->where('email', $request->email_user)
            ->first();

        if (!$user) {
            return back()
                ->withInput()
                ->with('error', 'User tidak ditemukan');
        }

        return back()
            ->withInput()
            ->with('success', 'User ditemukan')
            ->with('user_found', true)
            ->with('user_id', $user->id);
    }

}
