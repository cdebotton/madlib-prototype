<?php namespace Cdebotton\Serializer\EmberData;

use Illuminate\Support\Collection as LaravelCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Str;

class Collection extends EloquentCollection {
  public $modelKey;

  public function __construct(array $items = array(), $sideloads, $modelKey)
  {
    $this->items = $items;
    $this->sideloads = $sideloads;
    $this->modelKey = $modelKey;
  }

  public function toEmberArray()
  {
    $modelKey = $this->getModelKey();
    $items = [];
    $relations = [];

    $this->each(function($model) use (&$relations)
    {
            $relations = array_merge_recursive($model->relationsToArray(), $relations);
    });

    $this->each(function($model) use (&$items)
    {
            $items[] = $model->toEmberArray(false);
    });

    $array = array($modelKey => $items);

    return array_merge($array, $relations);
  }

  public function getModelKey()
  {
    return str_plural($this->modelKey);
  }
}
