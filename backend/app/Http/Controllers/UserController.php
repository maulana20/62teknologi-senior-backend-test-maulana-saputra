<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function page()
    {
		$user = User::orderBy('id', 'DESC')->paginate(5);
		
		return response()->json(['status' => 'success', 'users' => $user], 200);
	}
	
	public function register(Request $request)
	{
		$v = Validator::make($request->all(), [
			'email' => 'required|email|unique:users',
			'password' => 'required|min:3|confirmed',
		]);
		
		if ($v->fails()) return response()->json(['status' => 'error', 'errors' => $v->errors()], 442);
		
		$user = new User();
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->save();
		
		return response()->json(['status' => 'success'], 200);
	}
	
	public function edit($id)
	{
		$user = User::find($id);
		
		return response()->json(['status' => 'success', 'user' => $user], 200);
	}
}
