<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminHospital;

class AdminHospitalController extends Controller
{
    public function index()
    {
        $admins = AdminHospital::all();
        return response()->json($admins);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function create()
    {
        // Tampilkan form untuk membuat admin rumah sakit (jika diperlukan)
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hospital_id' => 'required',
            'username' => 'required',
            'alamat_email' => 'required|email',
            'password' => 'required',
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        $admin = AdminHospital::create($validatedData);
    
        return response()->json($admin, 201);
    }

    public function show(AdminHospital $admin)
    {
        // Tampilkan detail admin rumah sakit
        return response()->json($admin);
    }

    public function edit(AdminHospital $admin)
    {
        // Tampilkan form untuk mengedit admin rumah sakit (jika diperlukan)
    }

    public function update(Request $request, AdminHospital $admin)
    {
        $validatedData = $request->validate([
            'hospital_id' => 'required',
            'username' => 'required',
            'alamat_email' => 'required|email',
            'password' => 'required',
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        $admin->update($validatedData);
    
        return response()->json($admin, 200);
    }

    public function destroy(AdminHospital $admin)
    {
        // Hapus admin rumah sakit
        $admin->delete();
        return response()->json(null, 204); // 204 No Content status code
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin_hospital')->attempt($credentials)) {
            return redirect()->intended('/homepage');
        }

        return back()->withErrors(['message' => 'Invalid credentials']);
    }
    

    public function logout()
    {
        Auth::guard('admin_hospital')->logout();
        return redirect('/login');
    }
}
