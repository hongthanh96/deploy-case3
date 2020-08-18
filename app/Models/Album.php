<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Albumdetail;

class Album extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    public function albumdetails(){
        return $this->hasMany(Albumdetail::class,'album_id','id');
    }
}
