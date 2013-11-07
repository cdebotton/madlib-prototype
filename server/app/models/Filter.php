<?php

class Filter extends Eloquent {
  use Cdebotton\Serializer\EmberData\Adapter;

  protected $withIds = ['group'];

	protected $guarded = array();

	public static $rules = array();

  public function group()
  {
    return $this->belongsTo('Group');
  }
}
