<?php

namespace App\Repositories\Contracts;

//use App\Models\User;

/**
 * Interface UserRepository.
 */
interface UserRepository extends BaseRepository
{
  public function findById($id);

  public function findMe();

  public function all();

  public function updateProfile(array $data);

}
