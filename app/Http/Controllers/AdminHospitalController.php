<?php

namespace App\Http\Controllers;

use App\Models\AdminHospital;
use App\Http\Requests\StoreAdminHospitalRequest;
use App\Http\Requests\UpdateAdminHospitalRequest;
use Illuminate\Http\Request;

class AdminHospitalController extends Controller
{
    public function index()
    {
        $admins = AdminHospital::all();
        return response()->json($admins);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(AdminHospital $admin)
    {
        // $admin = AdminHospital::findOrFail($id,'id');
        return response()->json($admin);
    }

    public function edit(AdminHospital $admin)
    {
        // Not applicable for JSON response, as it's typically used to display a form
    }

    public function update(Request $request, AdminHospital $admin)
    {
        $validatedData = $request->validate([
            'hospital_id' => 'required',
            'username' => 'required',
            'alamat_email' => 'required|email',
            'password' => 'required',
        ]);

        $admin->update($validatedData);

        return response()->json($admin, 200); // 200 OK status code
    }

    public function destroy(AdminHospital $admin)
    {
        // $admin = AdminHospital::findOrFail($id,'id');
        $admin->delete();
        return response()->json(null, 204); // 204 No Content status code
    }
}
