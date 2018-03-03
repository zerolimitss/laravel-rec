<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'boss'];

    //
    public function parent(){
        return $this->belongsTo('App\Employee', 'boss', 'id');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
