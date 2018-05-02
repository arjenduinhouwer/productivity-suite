<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $casts = ['solved' => 'boolean'];

    public static $priorities = [1 => 'Normal', 2 => 'Urgent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriority()
    {
        return self::$priorities[$this->priority];
    }
}
