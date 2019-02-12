<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'tag_references';

    protected $fillable = [
        'name',
        'url',
        'order',
        'tag_book_id',
    ];

    public function tagBook()
    {
        return $this->belongsTo('App\Model\TagBook');
    }
}
