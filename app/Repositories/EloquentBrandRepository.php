<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Contracts\BrandRepository;

use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class EloquentCommodityRepository.
 */
class EloquentBrandRepository extends EloquentBaseRepository implements BrandRepository
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        parent::__construct($brand);
        $this->brand = $brand;
    }

    public function list($page = null)
    {
        $brand = $this->brand->with(['commoditys'])->get();

        return $brand;
    }

    public function makeBrand($request)
    {
        $brand = $this->brand->create($request->all());

        return $brand;
    }

    public function brandById($id)
    {
        $brand = $this->brand->find($id);

        return $brand;
    }
}
