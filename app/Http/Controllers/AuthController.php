<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function getPengguna($id)
    {
        return response()->json(Pengguna::where('id', $id)->get(), 200);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->where('password', $password)->get();
        return response([
            'statusAPI' => true,
            'message' => 'email dan password sesuai',
            'data' => $data
        ], 200);
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response([
            'statusAPI' => true,
            'message' => 'Pengguna berhasil ditambah'
        ], 200);
    }


}
