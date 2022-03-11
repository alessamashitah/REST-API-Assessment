<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;

class UserAPIController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(5);

        if($request->name)
        {
            $users = $users->where('name', $request->name);
        }
        
        if($request->email)
        {
            $users = $users->where('email', $request->email);
        }

        return response()->json([
            'success' => true,
            'message' => 'successful fetch all user',
            'data' => $users,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'username' => $request->username,
            'state' => $request->state,
            'district' => $request->district

        ]);

        return response()->json([
            'success' => true,
            'message' => 'successful resgister new users',
            'data' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'username' => $request->username,
            'state' => $request->state,
            'district' => $request->district
        ]);

        return response()->json([
            'success' => true,
            'message' => 'successful update user',
            'data' => $user
        ]);
    }

    public function show(Request $request, User $user)
    {
        return response()->json([
            'success' => true,
            'message' => 'successful show user',
            'data' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'successful delete user'
        ]);
    } 
}
