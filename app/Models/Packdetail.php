<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Packlist;

class Packdetail extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    // public function packlists(){
    //     return $this->belongsTo(Packlist::class,'packlist_id','id');
    // }
}
