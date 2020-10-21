<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    public function tasks()
    {
        return $this->hasMany('App\Model\Task');
    }
}
