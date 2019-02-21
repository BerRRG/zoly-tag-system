<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;
use App\Model\AttributeComment;
use App\Model\CustomDimension;

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

        $dimensions = array_values(Arr::get($this->input, 'attribute-dimensions', []));
        $this->saveRelationHasMany(
            $dimensions,
            CustomDimension::class,
            CustomDimensionSaveFlow::class,
            'tag_book_web_attribute_id'
        );
    }
}
