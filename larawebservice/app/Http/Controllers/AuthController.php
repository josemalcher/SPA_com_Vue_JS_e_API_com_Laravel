<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users,email',
            'password'  => 'required|string|confirmed'
        ]);
        $user = User::create([
            'name'      => $fields['name'],
            'email'     => $fields['email'],
            'password'  => bcrypt($fields['password'])
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'E-mail ou Senha invalidos.'
            ], 401);
        }

        $token = $user->createToken($user->email)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function perfil(Request $request)
    {
        $user  = $request->user();
        // $data = $request->all();

/*        $fields = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users',
            'password'  => 'required|string|confirmed'
        ]);

        if ($fields->fails()) {
            return response([
                'message' => 'ERROR!'
            ], 401);
        }*/
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users',
            'email'     => ['required','string',Rule::unique('users')->ignore($user->id)],
            'password'  => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
            // return response([
            // 'message' => 'ERROR!'
            // ], 401);
        }

        //$user->token = $user->createToken($user->email)->plainTextToken;

        return $user;

    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Deslogado com sucesso'
        ], 200);
    }
}
