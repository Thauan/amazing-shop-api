<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

/**
 * Class EloquentUserRepository.
 */
class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
  protected $user;
  protected $request;

  public function __construct(Request $request, User $user)
  {
    parent::__construct($user);
    $this->user = auth()->user();
    $this->request = $request;
  }

  public function all($page = null)
  {
    // $users = User::orderBy('created_at', 'DESC')
    // ->paginate(9, ['*'], 'page', $page);

    $users = User::all();

    return $users;
  }

  public function findById($id)
  {
    $user = User::where('id', $this->user->id)->findOrFail($id);

    return $user;
  }

  public function findMe()
  {
    $user = User::where('id', $this->user->id)->get();

    return $user;
  }

  public function updateProfile(array $data)
  {

    $user = User::where('id', $this->user->id)->first();

    $user->update($data);

    // $user = $this->user->where('id', $this->user->id)->first();

    return $this->findById($user->id);
  }
}
