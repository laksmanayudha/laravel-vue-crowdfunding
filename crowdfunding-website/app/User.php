<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;
use Carbon\Carbon;

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

    use UsesUuid;

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

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->role_id = $model->get_role_user();
        });

        static::creating(function($model){
            $model->generate_otp_code();
        })
    }

    public function get_role_user()
    {
        $role = Role::where('name', 'user')->first();
        return $role->id;
    }

    public function generate_otp_code()
    {
        do{
            $random = mt_rand(100000, 999999);
            $chek = Otp_code::where('otp', $random)->first();
        }while($chek);

        $now = Carbon::now();
        $otp_code = Otp_code::updateOrCreate(
            ['user_id' => $this->id],
            [
                'otp' => $random,
                'valid_until' => $now->addMinutes(5),
            ]
        );
    }

    // realationship

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function otp_code()
    {
        return $this->hasOne('App\Otp_code', 'user_id');
    }
}

