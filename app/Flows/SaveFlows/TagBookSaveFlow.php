<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;
use App\Model\TagBookWebAttribute;

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
    }
}
