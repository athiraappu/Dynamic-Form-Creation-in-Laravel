<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HtmlForm extends Model
{
    public $table = "html_form";
    
    public $fillable = ['form_id', 'label','html_control', 'html_field','control','comments'];
}
