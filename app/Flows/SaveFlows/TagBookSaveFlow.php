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

        foreach(Arr::get($this->input, 'attribute') as $attribute) {
            $webAttributeSaveFlow = new TagBookWebAttributeSaveFlow(
                new TagBookWebAttribute(),
                Arr::set($attribute, 'tag_book_id', $this->model->id)
            );
            $webAttributeSaveFlow->save();
        }
    }
}
