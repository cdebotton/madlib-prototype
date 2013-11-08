<?php

class Group extends Eloquent {
  use Cdebotton\Serializer\EmberData\Adapter;

	protected $guarded = array();

	public static $rules = array();

  protected $withIds = ['filters'];

  public function filters()
  {
    return $this->hasMany('Filter');
  }
}
