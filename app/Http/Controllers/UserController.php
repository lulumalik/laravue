<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use DB;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $payloadable = [
            'email' => $request->email
        ];
        $token = JWTAuth::claims($payloadable)->attempt($credentials);

        return response()->json(['token' => $token]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $email = $request->get('email');

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $email,
            'anggota' => null,
            'password' => Hash::make($request->get('password'))
        ]);
        $payloadable = [
            'email' => $request->email
        ];
        $token = JWTAuth::customClaims($payloadable)->fromUser($user);

        return response()->json(['token' => $token]);
    }

    public function postPackage(Request $request)
    {   
        try {
            // attempt to verify the credentials and create a token for the user
            $user = JWTAuth::parseToken()->authenticate();
            $id = $user->id;
            $package = $request->package;
            $person = User::find($id);
            $person->update([
                'package' => $package,
            ]);
            return response()->json(['token' => $person]);
        } catch (Throwable $e) {
            return false;
        }

       
    }

    public function postAnggota(Request $request)
    {
        $user_id = $request->id;
        
        $person = User::find($user_id);
        $person->update([
            'anggota' => $request->anggota,
        ]);

        return response()->json(['data' => $person]);
    }

    public function getUser($id)
    {
        $person = User::find($id);
        return response()->json($person);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}