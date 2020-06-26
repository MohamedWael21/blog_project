<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class user extends Model
{
    protected $fillable = ["username", "email", "password"];
    protected $hidden = ['created_at', 'updated_at'];

    public function posts()
    {
        return $this->hasMany("App\models\post");
    }
}
