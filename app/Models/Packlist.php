<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Packdetail;

class Packlist extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    // public function packlists(){
    //     return $this->hasMany(Packdetail::class,'packlist_id','id');
    // }
}
