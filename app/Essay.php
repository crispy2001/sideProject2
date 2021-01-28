<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    protected  $fillable = ['title', 'imgPath', 'content', 'editor'];
}
