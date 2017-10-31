<?php 


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

use JWTAuth;
use JWTAuthException;
use App\Exceptions\Handler;

class UserController extends Controller
{   
    private $user;
    public function __construct(Users $user){
        $this->user = $user;
    }
   
    public function register(Request $request){
        try{
             if($request->get('ic') && $request->get('user_type') && $request->get('password')){
                $user = $this->user->create([
                    'ic' => $request->get('ic'),
                    'email' => $request->get('email'),
                    'password' => bcrypt($request->get('password')),
                    'user_type' => $request->get('user_type'),
                    'status' => "passive"
                ]);
                return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
            }else{
                 return response()->json(['status'=>false,'message'=>'Mis
                 sing data: Need IC, User Type and Password to register']);
            }
        } catch(Exception $e){
            return response()->json(['status'=> false, 'message' => 'User creation unsuccessfully']); 
        }
    }
    
    public function login(Request $request){
        $credentials = $request->only('ic', 'password', 'user_type');
        $customClaims = ['user_type' => $request->input('user_type')];
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials, $customClaims)) {
            return response()->json(['invalid_ic_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }

        if($request->input('user_type') === 'user'){
            return response()->json(compact('token'));

        }elseif($request->input('user_type') === 'admin'){
            var_dump(compact('token')['token']);
            return response()
                    ->view('admin.home', ["tokenKey" => (compact('token'))])
                    ->cookie('access_token', compact('token')['token'], 10080);
        }
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }
}  