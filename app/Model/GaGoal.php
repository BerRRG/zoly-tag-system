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

    public $implementationStatus = [
        'done' => 'DONE',
        'to_do_tagging' => 'TO DO (TAGGING)',
        'to_do_config' => 'TO DO (CONFIG)',
        'validate' => 'VALIDATE',
        'adjust' => 'ADJUST',
        'revalidate' => 'REVALIDATE',
        'not_apply' => 'NOT APPLY',
    ];

    public function tagBook()
    {
        return $this->belongsTo('App\Model\TagBook');
    }
}
