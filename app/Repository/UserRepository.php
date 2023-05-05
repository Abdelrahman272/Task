<?php

namespace App\Repository;

use App\Traits\ResponseTrait;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Repository\GeneralUserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function show($id)
    {
        $user = User::find($id);

        return $user;
    }

    public function store($request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
        ]);

        return $user;
    }

    public function update($request, $id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return $user;
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
        ]);

        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return $user;
        }

        $user->delete();

        return $user;
    }
}
