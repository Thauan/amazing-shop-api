<?php

namespace App\Repositories\Contracts;

/**
 * Interface PaymentRepository.
 */
interface CommodityRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function list();

    public function findById($id);

    public function makeCommodity($request);

    public function updateCommodity($request, $id);

    public function attachBrand($request, $id);
}
