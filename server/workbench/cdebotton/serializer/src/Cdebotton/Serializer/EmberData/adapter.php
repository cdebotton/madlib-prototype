<?php namespace Cdebotton\Serializer\EmberData;

use Cdebotton\Serializer\EmberData\Collection as EmberCollection;

trait Adapter {
  public function toEmberArray($withWrap = true)
  {
    $relations = array_merge($this->withIds, $this->with);
    $sideLoaded = $this->relationsToArray();

    foreach ($relations as $relation) {
      $collection = $this->{$relation};
      if (substr($relation, -1) === 's') {
        $key = snake_case(str_singular($relation));
        $this->attributes["{$key}s"] = $collection->modelKeys();
      }
      else {
        $this->attributes["{$relation}"] = $collection->id;
      }
    }

    if (! $withWrap) {
      return $this->removeRelations($relations);
    }
    else {
      return $this->sideloadRelated($relations, $sideLoaded);
    }
  }

  public function sideloadRelated($relations, $sideloaded)
  {
    $array = [$this->getModelKey() => $this->removeRelations($relations)];

    return array_merge($array, $sideloaded);
  }

  public function removeRelations($relations)
  {
    $array = $this->toArray();

    foreach ($relations as $relation) {
      if (substr($relation, -1) !== 's') {
        $array[$relation] = $array["{$relation}_id"];
        unset($array["{$relation}_id"]);
      }
      else {
        $array[$relation] = $this->{$relation};
      }
    }

    return $array;
  }

  public function newCollection(array $models = array())
  {
    return new EmberCollection($models, $this->withIds, $this->getModelKey());
  }

  public function toArrayWithRelations()
  {
    return parent::toArray();
  }

  public function getModelKey()
  {
    return str_replace('\\', '', snake_case(class_basename($this)));
  }
}
