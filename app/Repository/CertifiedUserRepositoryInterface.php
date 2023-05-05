<?php

namespace App\Repository;

interface CertifiedUserRepositoryInterface
{
    public function show($id);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}
