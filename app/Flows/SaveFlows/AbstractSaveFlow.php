<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;

abstract class AbstractSaveFlow
{
    protected $model;
    protected $input;

    public function __construct($model, $input)
    {
        $this->model = $model;
        $this->input = $input;
    }

    abstract public function save();

    protected function saveRelationHasMany($objects, $modelClass, $modelSaveFlow, $relationKey)
    {
        foreach($objects as $key => $object) {
            $model = new $modelClass();

            if (Arr::get($object, 'id')) {
                $model = $model::find(Arr::get($object, 'id'));
            }

            Arr::set($object, 'order', $key);
            Arr::set($object, $relationKey, $this->model->id);

            $modelSaveFlow = new $modelSaveFlow(
                $model,
                $object
            );

            $modelSaveFlow->save();
        }
    }
}
