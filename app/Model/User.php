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
    public function delete()
    {
        // delete all related photos
        $this->tasks()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
}
