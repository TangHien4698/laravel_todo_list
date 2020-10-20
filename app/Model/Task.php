<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'id_cat');
    }
}
