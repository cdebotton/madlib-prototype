<?php namespace Repositories;

use Group;

class EmberGroupRepository implements GroupRepositoryInterface {
  public function all()
  {
    $groups = Group::with('filters')->get();

    return $groups->toEmberArray();
  }

  public function find($id = null)
  {

  }
}
