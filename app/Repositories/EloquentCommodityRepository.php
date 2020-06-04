<?php

namespace App\Repositories;

use App\Models\Commodity;
use App\Repositories\Contracts\CommodityRepository;

use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class EloquentCommodityRepository.
 */
class EloquentCommodityRepository extends EloquentBaseRepository implements CommodityRepository
{
    protected $commodity;

    public function __construct(Commodity $commodity)
    {
        parent::__construct($commodity);
        $this->commodity = $commodity;
    }

    public function list($page = null)
    {
        $commodity = $this->commodity->with(['brands'])->get();

        return $commodity;
    }

    public function makeCommodity($request)
    {
        $commodity = $this->commodity->create($request->all());

        return $commodity;
    }

    public function updateCommodity($request, $id)
    {
        $commodity = $this->findById($id);

        $this->commodity->update([$request]);

        return $commodity;
    }

    public function attachBrand($request, $id)
    {
        $commodity = $this->commodity->find($id);

        if($request->brand_ids && $commodity) $commodity->brands()->sync($request->input('brand_ids', []));
    }

    public function findById($id)
    {
        $commodity = $this->commodity->find($id);

        return $commodity;
    }
}
