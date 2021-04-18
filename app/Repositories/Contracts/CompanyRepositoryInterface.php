<?php

namespace App\Repositories\Contracts;

interface CompanyRepositoryInterface
{

    public function get($id);

    public function all();

    public function delete($id);

}
