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


}
