<?php

namespace App\Repositories;

interface CommodityRepositoryInterface
{
    public function all();

    public function findById($id);
}
