<?php namespace Repositories;

use Filter;

class EmberFilterRepository implements FilterRepositoryInterface {
  public function all()
  {
    $filters = Filter::with('group')->get();

    return $filters->toEmberArray();
  }

  public function find($id = null)
  {

  }
}
