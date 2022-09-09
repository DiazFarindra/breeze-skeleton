<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();

        return view('users.create', [
            'roles' => $roles,
        ]);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $user->roles()->attach($request->roles);

        return redirect()->route('users.index');
    }

    public function edit(User $account)
    {
        $roles = Role::get();

        return view('users.edit', [
            'account' => $account,
            'roles' => $roles,
        ]);
    }

    public function update(UserRequest $request, User $account)
    {
        $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $account->update($data);

        $account->roles()->sync($request->roles);

        return redirect()->route('users.index');
    }

    public function destroy(User $account)
    {
        $account->roles()->detach();

        $account->delete();

        return redirect()->route('users.index');
    }
}
