<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = strtolower(str_replace(' ', '-', trim($this->name)));
    }
}
