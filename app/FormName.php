<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormName extends Model
{
    public $table = "form_name";
    
    public $fillable = ['form_name'];
}
