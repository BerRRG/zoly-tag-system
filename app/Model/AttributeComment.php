<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeComment extends Model
{
    protected $fillable = [
        'variable',
        'example',
        'description',
        'note',
        'tag_book_web_attribute_id',
        'order',
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Model\TagBookWebAttribute', 'tag_book_web_attribute_id');
    }
}
