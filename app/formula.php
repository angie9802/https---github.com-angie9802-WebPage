<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formula extends Model
{
    protected $fillable = ['patient_id','medicine','dose','duration'];//
}
