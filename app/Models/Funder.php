<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funder extends Model
{
    //afin de préciser que le model n'est pas timestamp
    public $timestamps = false;
    //précision des attributs modifiable
    public $fillable = ['title', 'body'];
}