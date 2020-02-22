<?php

namespace App\Repositories\Contracts;

/**
 * Interface PaymentRepository.
 */
interface BrandRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function list();

    public function brandById($id);

    public function makeBrand($request);
}
