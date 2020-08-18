<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userinformation extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
