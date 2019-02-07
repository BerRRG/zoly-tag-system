<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TagBook extends Model
{
    protected $fillable = ['name'];

    public function webAttributes()
    {
        return $this->hasMany('App\Model\TagBookWebAttribute');
    }
}
