<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;
use App\Model\TagBookWebAttribute;
use App\Model\GaElement;

class TagBookSaveFlow extends AbstractSaveFlow
{
    public function save()
    {
        $this->model->fill($this->input);
        $this->model->save();

        $attributes = array_values(Arr::get($this->input, 'attribute'));

        foreach($attributes as $key => $attribute) {
            $tagAttribute = new TagBookWebAttribute();

            if (Arr::get($attribute, 'id')) {
                $tagAttribute = TagBookWebAttribute::find(Arr::get($attribute, 'id'));
            }

            Arr::set($attribute, 'order', $key);
            Arr::set($attribute, 'tag_book_id', $this->model->id);

            $webAttributeSaveFlow = new TagBookWebAttributeSaveFlow(
                $tagAttribute,
                $attribute
            );

            $webAttributeSaveFlow->save();
        }

        $gaElements = array_values(Arr::get($this->input, 'ga-element'));

        foreach($gaElements as $key => $element) {
            $tagElement = new GaElement();

            if (Arr::get($element, 'id')) {
                $tagElement = GaElement::find(Arr::get($element, 'id'));
            }

            Arr::set($element, 'order', $key);
            Arr::set($element, 'tag_book_id', $this->model->id);

            $elementSaveFlow = new GaElementSaveFlow(
                $tagElement,
                $element
            );

            $elementSaveFlow->save();
        }
    }
}
