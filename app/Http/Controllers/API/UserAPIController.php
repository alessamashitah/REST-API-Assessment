<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserAPIController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereLike('name', $request->name)->orWhereLike('email',$request->email)->paginate(5);

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

    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();

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
        return new UserResource($user);
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
