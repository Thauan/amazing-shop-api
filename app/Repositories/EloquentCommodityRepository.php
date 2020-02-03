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
        $commodity = $this->commodity->with(['variants', 'brands'])->get();

        return $commodity;
    }

    public function makeCommodity($request)
    {
        $commodity = $this->commodity->create($request->all());

        // if (!$commodity->brand) {
        //     $commodity->brands->create([$request->brand_id => '1472d38a-2601-11ea-a1ae-681401a7c5a1']);
        // };

        return $commodity;
    }

    public function findById($id)
    {
        $commodity = $this->commodity->find($id);

        return $commodity;
    }
}