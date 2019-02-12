<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;
use App\Model\TagBookWebAttribute;
use App\Model\GaElement;
use App\Model\GaGoal;
use App\Model\Reference;

class TagBookSaveFlow extends AbstractSaveFlow
{
    public function save()
    {
        $this->model->fill($this->input);
        $this->model->save();

        $attributes = array_values(Arr::get($this->input, 'attribute'));

        $this->saveRelationHasMany(
            $attributes,
            TagBookWebAttribute::class,
            TagBookWebAttributeSaveFlow::class
        );

        $gaElements = array_values(Arr::get($this->input, 'ga-element'));

        $this->saveRelationHasMany(
            $gaElements,
            GaElement::class,
            GaElementSaveFlow::class
        );

        $gaGoals = array_values(Arr::get($this->input, 'ga-goals'));
        $this->saveRelationHasMany(
            $gaGoals,
            GaGoal::class,
            GaGoalSaveFlow::class
        );

        $references = array_values(Arr::get($this->input, 'references'));
        $this->saveRelationHasMany(
            $references,
            Reference::class,
            ReferenceSaveFlow::class
        );
    }

    protected function saveRelationHasMany($objects, $modelClass, $modelSaveFlow)
    {
        foreach($objects as $key => $object) {
            $model = new $modelClass();

            if (Arr::get($object, 'id')) {
                $model = $model::find(Arr::get($object, 'id'));
            }

            Arr::set($object, 'order', $key);
            Arr::set($object, 'tag_book_id', $this->model->id);

            $modelSaveFlow = new $modelSaveFlow(
                $model,
                $object
            );

            $modelSaveFlow->save();
        }
    }
}
