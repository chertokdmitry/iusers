<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    protected $table = 'role_type';

    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }
}
