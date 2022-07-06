<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Role extends Model
{
    protected $fillable = ['name'];
    protected $primaryKey = 'id';

    use UsesUuid;

    public function users(){
        return $this->hasMany('App\User', 'role_id');
    }

}
