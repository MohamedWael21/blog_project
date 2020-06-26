<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['body','img','user_id'];

    protected $hidden =['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo("App\models\user");    
    }
}
