<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Otp_code extends Model
{
    use UsesUuid;
    protected $primayKey = 'id';
    protected $fillable = ['otp', 'valid_until', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
