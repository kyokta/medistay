<?php

namespace App\Http\Controllers;

use App\Models\AdminHospital;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = AdminHospital::where('username', $request->username)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['The provided credentials are incorrect.'],
                ]);
            }

            $token = $user->createToken($user->username)->plainTextToken;

            return response()->json([
                "token" => $token,
                'id'=>$user->id,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }

    }

    public function registrasi(Request $request)
    {
        $validated = $request->validate([
            'hospital_id' => 'required',
            'username' => 'required|max:50',
            'alamat_email' => 'required',
            'password' => 'required|max:50',
        ]);

        try{
            $user = AdminHospital::create([
                'username' => $validated['username'],
                'alamat_email' => $validated['email'],
                'hospital_id' => $validated['hospital_id'],
                'password' => Hash::make($validated['password']),
            ]);

            return response()->json([
                'username' => $user->username,
                'status' => 'Success'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'error' => $e
            ],400);
        }
    }
}
