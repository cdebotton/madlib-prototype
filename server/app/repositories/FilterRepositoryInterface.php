<?php namespace Repositories;

interface FilterRepositoryInterface {
  public function all();
  public function find($id = null);
}
