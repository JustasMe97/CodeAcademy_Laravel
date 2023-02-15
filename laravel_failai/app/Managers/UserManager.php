<?php

namespace App\Managers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserManager
{
    public function createUser(UserRequest $request): User
    {
        $user = User::create($request->all());
        return $user;
    }

    public function getUsers(): Collection
    {
        $users = User::query()->get();
        return $users;
    }

    public function updateUser(UserUpdateRequest $request, User $user): User
    {
        $user->update($request->all());
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
