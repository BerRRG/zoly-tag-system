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

    public $scopeStatus = [
        '-' => '-',
        'hit' => 'Hit',
        'session' => 'Session',
        'user' => 'User',
        'e_commerce' => 'e-commerce(Product)',
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
