<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GaGoal extends Model
{
    protected $fillable = [
        'ga_index',
        'name',
        'description',
        'type',
        'condition_rules',
        'status',
        'order',
        'tag_book_id',
    ];

    public function tagBook()
    {
        return $this->belongsTo('App\Model\TagBook');
    }
}
