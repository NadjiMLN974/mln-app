<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //précision des attributs modifiable
    public $fillable = ['title', 'body'];
}