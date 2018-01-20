<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    protected $fillable = ['title', 'detail', 'deadline', 'priority'];
}
