<?php

namespace App\Http\Controllers\Auth\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;

class LoginController extends Controller
{
    use ApiResponser;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            $user = Auth::user();
            
            $success['token'] =  $user->createToken('auth-token')->plainTextToken; 
            $success['name'] =  $user->name;
   
            if (empty($user->email_verified_at)) {
                return $this->sendResponse($success, 'Please verify your email.');
            } else {
                return $this->sendResponse($success, 'Login successfully.');
            }
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
    
    /**
     * Logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        
        return $this->sendResponse(null, 'Logout successfully.');
    }
}
