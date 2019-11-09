<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models\User
 */

class User extends Model
{
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }
}
