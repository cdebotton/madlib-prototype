<?php namespace Api\V1;

use BaseController;
use Repositories\FilterRepositoryInterface;

class FiltersController extends BaseController {
  public function __construct(FilterRepositoryInterface $filter)
  {
    $this->filter = $filter;
  }

  public function index()
  {
    return $this->filter->all();
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
