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
}
