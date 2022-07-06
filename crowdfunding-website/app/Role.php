<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if( empty($model->{$model->getKeyName()}) ){
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }

    public function users(){
        return $this->hasMany('App\User', 'role_id');
    }

}
