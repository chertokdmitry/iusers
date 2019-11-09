<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_type', 'type_id', 'role_id');
    }
}
