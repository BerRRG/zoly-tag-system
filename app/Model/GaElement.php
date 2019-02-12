<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GaElement extends Model
{
    protected $fillable = [
        'type',
        'index',
        'name',
        'description',
        'format_example',
        'scope',
        'status',
        'comment',
        'section',
        'order',
        'tag_book_id',
    ];

    public function tagBook()
    {
        return $this->belongsTo('App\Model\TagBook');
    }
}
