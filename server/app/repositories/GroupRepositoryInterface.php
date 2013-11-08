<?php namespace Repositories;

interface GroupRepositoryInterface {
  public function all();
  public function find($id = null);
}
