<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repository\GeneralUserRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    protected $User;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->User = $User;
    }

    public function show($id)
    {
        $user = $this->User->show($id);

        if ($user) {
            return $this->apiResponse(new UserResource($user), 'User Is Found', 200);
        }

        return $this->apiResponse("Error", 'The User Is Not Found', 404);
    }

    public function store(UserRequest $request)
    {
        $user = $this->User->store($request);

        if ($user) {
            return $this->apiResponse(new UserResource($user), 'The The User Created', 200);
        }

        return $this->apiResponse("Error", 'The User Not Save', 400);
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->User->update($request, $id);

        if ($user) {

            return $this->apiResponse(new UserResource($user), 'The The User Updated', 200);

        } else {

            return $this->apiResponse("Error", 'The The User Not Found', 400);
        }
    }

    public function destroy($id)
    {
        $user =  $this->User->destroy($id);

        if ($user) {

            return $this->apiResponse("Success", 'The The User Deleted Successfully', 200);

        } else {

            return $this->apiResponse("Error", 'The The User Not Found', 400);
        }
    }
}
