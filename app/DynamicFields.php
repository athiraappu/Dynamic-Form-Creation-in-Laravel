<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicFields extends Model
{
    public $fillable = ['label', 'field', 'comments'];
}
