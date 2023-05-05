<?php

namespace App\Repository;

use App\Models\CertifiedUser;
use App\Traits\ResponseTrait;
use App\Http\Requests\CertifiedUserRequest;
use App\Http\Resources\CertifiedUserResource;
use App\Repository\CertifiedUserRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\UploadFile;

class CertifiedUserRepository implements GeneralUserRepositoryInterface
{
    use UploadFile;

    public function show($id)
    {
        $user = CertifiedUser::find($id);

        return $user;
    }

    public function store($request)
    {
        $certifiedUser = CertifiedUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
            'title' => $request->title,
            'file' => $this->fileUpload($request->file('file'), 'certified_user'),
        ]);

        return $certifiedUser;
    }

    public function update($request, $id)
    {
        $certifiedUser = CertifiedUser::find($id);

        if(!$certifiedUser)
        {
            return $certifiedUser;
        }

        $old_file = $certifiedUser->file;

        if (file_exists($old_file) && $request->file('file'))
        {
            unlink($old_file);
        }

        $certifiedUser->update([
            'username' => $request->username,
            'email' => $request->email,
            'bio' => $request->bio,
            'title' => $request->title,
            // 'file' => $this->fileUpload($request->file('file'), 'certified_user'),
        ]);


        return $certifiedUser;

    }

    public function destroy($id)
    {
        $certifiedUser = CertifiedUser::find($id);

        if(!$certifiedUser)
        {
            return $certifiedUser;
        }

        $old_file = $certifiedUser->file;

        if (file_exists($old_file))
        {
            unlink($old_file);
        }

        $certifiedUser->delete();

        return $certifiedUser;

    }
}
