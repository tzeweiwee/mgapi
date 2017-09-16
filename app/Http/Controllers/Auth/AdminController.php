<?php 


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

use JWTAuth;
use JWTAuthException;
use App\Exceptions\Handler;

class AdminController extends Controller
{   

    private $user;
    public function __construct(Users $user){
        $this->user = $user;
    }

    public function showLogin(){
        return view('auth/login');
    }
    
    public function login(Request $request){
        $credentials = $request->only('ic', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials, $customClaims)) {
            return response()->json(['invalid_ic_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}  