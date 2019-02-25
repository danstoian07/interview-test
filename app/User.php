<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function pictures()
    {
        return $this->hasMany(ScheduleContent::class)->orderBy('updated_at', 'desc');
    }

    public function published_pictures()
    {
        return $this->hasMany(ScheduleContent::class)->where('status', '=', 'published')->orderBy('updated_at', 'desc');
    }

    public function draft_pictures()
    {
        return $this->hasMany(ScheduleContent::class)->where('status', '=', 'draft')->orderBy('updated_at', 'desc');
    }

}
