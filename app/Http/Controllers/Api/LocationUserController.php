<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationUserResource;
use App\Repository\GeneralUserRepositoryInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class LocationUserController extends Controller
{
    use ResponseTrait;

    protected $LocationUser;
    public function __construct(GeneralUserRepositoryInterface $LocationUser)
    {
        $this->LocationUser = $LocationUser;
    }

    public function show($id)
    {
        $locationUser =  $this->LocationUser->show($id);

        if ($locationUser) {
            return $this->apiResponse(new LocationUserResource($locationUser), 'User Is Found', 200);
        } else {
            return $this->apiResponse("error", 'User Is Not Found', 404);
        }
    }

    public function store(LocationRequest $request)
    {
        $locationUser = $this->LocationUser->store($request);

        if ($locationUser) {
            return $this->apiResponse(new LocationUserResource($locationUser), 'User Is Created', 200);
        } else {

            return $this->apiResponse("Error", 'User Is Not Created', 404);
        }
    }

    public function update(LocationRequest $request, $id)
    {
        $locationUser = $this->LocationUser->update($request, $id);

        if ($locationUser) {

            return $this->apiResponse(new LocationUserResource($locationUser), 'Success Updated', 200);

        } else {
            return $this->apiResponse("Error", 'Error Updating', 404);
        }
    }

    public function destroy($id)
    {
        $locationUser = $this->LocationUser->destroy($id);

        if ($locationUser) {
            return $this->apiResponse("Success", 'Success Deleting', 200);
        }

        return $this->apiResponse("Error", 'Error Deleting', 404);
    }
}
