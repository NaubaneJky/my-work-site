<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\ActivityHelper;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
{
    $user = User::create($request->all());

    ActivityHelper::log(
        action: 'create',
        model: 'User',
        modelId: $user->id,
        newValues: $user->toArray()
    );

    return redirect()->back();
}

public function update(Request $request, User $user)
{
    $oldValues = $user->toArray();

    $user->update($request->all());

    ActivityHelper::log(
        action: 'update',
        model: 'User',
        modelId: $user->id,
        allValues: $oldValues,
        newValues: $user->toArray()
    );

    return redirect()->back();
}

public function destroy(User $user)
{
    $oldValues = $user->toArray();

    $user->delete();

    ActivityHelper::log(
        action: 'delete',
        model: 'User',
        modelId: $user->id,
        allValues: $oldValues
    );

    return redirect()->back();
}
}
