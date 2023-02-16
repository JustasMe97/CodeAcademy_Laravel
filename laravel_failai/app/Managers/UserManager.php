<?php

namespace App\Managers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserManager
{
    public function createUser(UserRequest $request): User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if (Auth::user()->role === User::ROLE_ADMIN){
            $user->role = $request->role;
        }
        $user->save();
        return $user;
    }

    public function getUsers(): Collection
    {
        $users = User::query()->get();
        return $users;
    }

    public function updateUser(UserUpdateRequest $request, User $user): User
    {
        $data = $request->all();
        if ($request->password === null){
            unset($data['password']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if (Auth::user()->role === User::ROLE_ADMIN){
            $user->role = $request->role;
        }
        $user->save();

        return $user;
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }

    public function getLatestUsers(): Collection
    {
        $users = User::latest()->take(5)->get();
        return $users;
    }

}
