<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'role_id', 'photo_profile'
    ];
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}


// User::create(
//     [
//         'name' =>'Laksmana Yudha', 
//         'email' => 'laksmanayudha22@gmail.com', 
//         'password' => '12345678', 
//         'username' => 'laksmanayudha', 
//         'role_id' => 'c0e93ac6-61b2-4dfc-bb79-1316be3b0502'
//     ])


// Role::create(['name' => 'admin'])

