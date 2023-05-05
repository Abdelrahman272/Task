<?php

namespace App\Repository;

interface GeneralUserRepositoryInterface
{
    public function show($id);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}
