<?php 


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

use JWTAuth;
use JWTAuthException;

class UserController extends Controller
{   

    private $user;
    public function __construct(Users $user){
        $this->user = $user;
    }
   
    public function register(Request $request){

        if($request->get('ic') && $request->get('email') && $request->get('password')){
            $user = $this->user->create([
                'ic' => $request->get('ic'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'user_type' => "user",
                'status' => "passive"
            ]);
             return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
        }
        return response()->json(['status'=> false, 'message' => 'User creation unsuccessfully']);
    }
    
    public function login(Request $request){
        $credentials = $request->only('ic', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
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