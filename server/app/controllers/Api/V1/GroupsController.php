<?php namespace Api\V1;

use BaseController;
use Repositories\GroupRepositoryInterface;

class GroupsController extends BaseController {
  public function __construct(GroupRepositoryInterface $group)
  {
    $this->group = $group;
  }

  public function index()
  {
    return $this->group->all();
  }

  public function create()
  {

  }

  public function store()
  {

  }

  public function update($id = null)
  {

  }

  public function read($id = null)
  {

  }

  public function destroy($id = null)
  {

  }
}
