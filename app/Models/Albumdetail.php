<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Album;

class Albumdetail extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    public function albums(){
        return $this->belongsTo(Album::class,'album_id','id');
    }
}
