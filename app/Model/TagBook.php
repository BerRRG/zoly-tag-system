<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TagBook extends Model
{
    protected $fillable = [
        'client_name',
        'project_name',
        'user_name',
        'user_mail',
        'ga_code',
        'gtm_code',
    ];

    public function webAttributes()
    {
        return $this->hasMany('App\Model\TagBookWebAttribute');
    }
}
