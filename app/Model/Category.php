<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public function tasks()
    {
        return $this->hasMany('App\Model\Task', 'category_id', 'id');
    }
}
