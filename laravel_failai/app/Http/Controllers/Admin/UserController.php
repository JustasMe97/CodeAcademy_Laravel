<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Managers\UserManager;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(protected UserManager $manager)
    {
    }

    public function index()
    {
        $users = $this->manager->getUsers();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $user = $this->manager->createUser($request);
        return redirect()->route('users.show', $user);
    }

    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user=$this->manager->updateUser($request,$user);
        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $this->manager->deleteUser($user);
        return redirect()->route('users.index');
    }
}
