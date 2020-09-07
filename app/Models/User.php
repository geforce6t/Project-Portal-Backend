<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Laravel\Passport\HasApiTokens; 

class User extends Model
{

    use Notifiable, HasApiTokens; 

    protected $table = 'users';
    protected $hidden = ['email', 'password'];
    public $timestamps = true;

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project')->withPivot('role');
    }

}
