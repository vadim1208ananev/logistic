<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterVendor;

class User extends Authenticatable implements MustVerifyEmail
{
    protected static function boot()
    {
        parent::boot();
         static::creating(function($user)
        {
           if($user->role=='vendor')
           {
               $need_email='michael@logistiquote.com';
               Mail::to($need_email)->send(new RegisterVendor($user));
           }
        });
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'company_name', 'country', 'password', 'additional_email', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
