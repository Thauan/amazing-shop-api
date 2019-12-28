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

//   public function CreatePayment(array $attributes);

//   public function MyPays($page);

//   public function PayShowId($id);

//   public function AdminShowPayId($id);

//   public function updatePayStatus($id, $situation_pay_id);

//   public function updatePay($id, array $attributes);

  //public function delete($payment);
}
