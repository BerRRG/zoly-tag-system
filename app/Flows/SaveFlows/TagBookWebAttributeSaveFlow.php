<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;
use App\Model\AttributeComment;

class TagBookWebAttributeSaveFlow extends AbstractSaveFlow
{
    public function save()
    {
        $this->model->fill($this->input);
        $this->model->save();

        $comments = array_values(Arr::get($this->input, 'attribute-comments', []));
        $this->saveRelationHasMany(
            $comments,
            AttributeComment::class,
            AttributeCommentSaveFlow::class,
            'tag_book_web_attribute_id'
        );
    }
}
