<?php

namespace App\Repository;

interface LocationUserRepositoryInterface
{
    public function show($id);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}
