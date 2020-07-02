<?php

namespace App\Http\Controllers;

use App\CustomHelpers\JSONResponseHelper;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request){
        $JSONResponseHelper = new JSONResponseHelper();

        // Extract the Basic auth credentials
        $credentials = explode(":", base64_decode(substr($request->header('Authorization'), 6)));

        // Credentials not found
        if(empty($credentials)){
            return $JSONResponseHelper->badRequestJSONResponse("Invalid login request");
        }
        // Credentials founds
        else{
            $user = User::where([
                "email" => $credentials[0],
                "password" => $credentials[1],
                "confirmed" => true,
                "deleted" => false]
            )->first();

            // Wrong credentials
            if(empty($user)){
                return $JSONResponseHelper->badRequestJSONResponse("Invalid login request");
            }
            // Auth OK -> Generate JWT
            else{
                $token = [
                    "firstname" => $user->firstname,
                    "lastname" => $user->lastname,
                    "email" => $user->email,
                    "role" => "SUPER_ADMIN"
                ];
                $token = JWT::encode($token, env("JWT_SECRET", null));
                return $JSONResponseHelper->successJSONResponse(['token' => $token]);
            }
        }

    }

}
