<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        Log::info("user Created: ", $user->toArray());
        return response()->json($user,200);

    }
    
    public function index()
    {
        $users = User::all();
        Log::info("user get: ", $users->toArray());
        return response()->json($users,200);

    }

    public function show($id)
    {
        
        $user = User::find($id);
        if(!$user)
        {
            return response()->json(['message' => 'User not found'],400);
        }
        Log::info("user details: ", $user->toArray());
        return response()->json($user,200);
    }

    public function update(Request $request, $id)
    {
        
        $validator= Validator::make($request->all(),[
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:6'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $user = User::find($id);
        if(!$user)
        {
            return response()->json(['message' => 'User not found'],400);
        }
       $user->first_name = $request->input('first_name', $user->first_name);
       $user->last_name = $request->input('last_name', $user->last_name);
       $user->email = $request->input('email', $user->email);

        if($request->has('password'))
        {
            $user->password = Hash::make($request->input('password'));
           
        }
        $user->save();
        Log::info("user updated: ", $user->toArray());
        return response()->json($user,200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user)
        {
            return response()->json(['message' => ' User not found', 400]);

        }
        $user->delete();
        Log::info("user deleted: ", $user->toArray());
        return response()->json(['message' => 'User deleted Successfully','status'=>200]);
    }
}
