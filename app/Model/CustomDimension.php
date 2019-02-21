<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomDimension extends Model
{
    protected $fillable = [
        'name',
        'variable',
        'label',
        'tag_book_web_attribute_id',
        'order',
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Model\TagBookWebAttribute', 'tag_book_web_attribute_id');
    }
}
