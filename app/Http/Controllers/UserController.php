<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::where([
                'email' => $request->email
            ])->first();

            if (Auth::attempt(['email' => trim($request->email), 'password' => trim($request->password)])) {
                return response("usuário logado", 200);
            } else {
                return response("email/password inválidos", 200);
            }
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    public function register(Request $request)
    {
        try {
            User::create([
                'name' => 'default',
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }

        return response("Usuario cadastrado com sucesso", 200);
    }
}
