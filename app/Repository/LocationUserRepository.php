<?php

namespace App\Repository;

use App\Http\Resources\LocationUserResource;
use App\Repository\LocationUserRepositoryInterface;
use App\Models\LocationUser;
use App\Traits\ResponseTrait;

class LocationUserRepository implements GeneralUserRepositoryInterface
{
    use ResponseTrait;

    public function show($id)
    {
        $locationUser = LocationUser::find($id);

        return $locationUser;
    }

    public function store($request)
    {
        $locationUser = LocationUser::create([
            'username'      => $request->username,
            'email'         => $request->email,
            'bio'           => $request->bio,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'date_of_birth' => $request->date_of_birth
        ]);

        return $locationUser;
    }

    public function update($request, $id)
    {
        $locationUser = LocationUser::find($id);

        if (!$locationUser) {

            return $locationUser;
        }

        $locationUser->update([
            'username'      => $request->username,
            'email'         => $request->email,
            'bio'           => $request->bio,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'date_of_birth' => $request->date_of_birth
        ]);

        return $locationUser;
    }

    public function destroy($id)
    {
        $locationUser = LocationUser::find($id);

        if (!$locationUser) {

            return $locationUser;
        }

        $locationUser->delete();

        return $locationUser;
    }
}
