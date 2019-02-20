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
            TagBookWebAttributeSaveFlow::class,
            'tag_book_id'
        );

        $gaElements = array_values(Arr::get($this->input, 'ga-element'));

        $this->saveRelationHasMany(
            $gaElements,
            GaElement::class,
            GaElementSaveFlow::class,
            'tag_book_id'
        );

        $gaGoals = array_values(Arr::get($this->input, 'ga-goals'));
        $this->saveRelationHasMany(
            $gaGoals,
            GaGoal::class,
            GaGoalSaveFlow::class,
            'tag_book_id'
        );

        $references = array_values(Arr::get($this->input, 'references'));
        $this->saveRelationHasMany(
            $references,
            Reference::class,
            ReferenceSaveFlow::class,
            'tag_book_id'
        );
    }
}
