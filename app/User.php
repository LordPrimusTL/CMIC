<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password','email','firstname','lastname','phone_number','address','is_active','role_id','image','level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        $this->belongsTo(Role::class,'role_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'user_id');
    }

    public function reg()
    {
        return $this->hasMany(inv_reg::class,'user_id');
    }

    public function trans()
    {
        return $this->hasMany(Transactions::class,'user_id');
    }

    public function earn()
    {
        return $this->hasMany(Earning::class,'user_id');
    }

    public function level()
    {
        return $this->belongsTo(level::class,'level_id');
    }

}
