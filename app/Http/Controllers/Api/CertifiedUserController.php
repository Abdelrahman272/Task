<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertifiedUserRequest;
use App\Http\Resources\CertifiedUserResource;
use App\Models\CertifiedUser;
use App\Repository\GeneralUserRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Traits\UploadFile;
use GrahamCampbell\ResultType\Success;

class CertifiedUserController extends Controller
{
    use ResponseTrait;

    protected $CertifiedUser;

    public function __construct(GeneralUserRepositoryInterface $CertifiedUser)
    {
        $this->CertifiedUser = $CertifiedUser;
    }

    public function show($id)
    {
        $user =  $this->CertifiedUser->show($id);

        if ($user) {
            return $this->apiResponse(new CertifiedUserResource($user), 'User Is Found', 200);
        }

        return $this->apiResponse("Error", 'The User Is Not Found', 404);
    }

    public function store(CertifiedUserRequest $request)
    {
        $certifiedUser =  $this->CertifiedUser->store($request);

        if ($certifiedUser) {

            return $this->apiResponse(new CertifiedUserResource($certifiedUser), 'Created Successfully', 200);

        } else {

            return $this->apiResponse("Error", 'Not Created', 400);
        }
    }

    public function update(CertifiedUserRequest $request, $id)
    {
        $certifiedUser = $this->CertifiedUser->update($request, $id);

        if ($certifiedUser) {

            return $this->apiResponse(new CertifiedUserResource($certifiedUser), 'Updated Successfully', 200);

        }else{
            return $this->apiResponse("Error", 'Not Updated', 400);
        }
    }

    public function destroy($id)
    {
        $certifiedUser =  $this->CertifiedUser->destroy($id);

        if ($certifiedUser) {

            return $this->apiResponse("Success", 'Deleted Successfully', 200);

        }else{

            return $this->apiResponse("Error", 'Not Deleted', 400);
        }
    }
}
