<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categorys';
    protected $primaryKey = 'id_cat';
    public function tasks()
    {
        return $this->hasMany('App\Model\Task', 'category_id', 'id_cat');
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
