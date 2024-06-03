<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'Role';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'last_update'
    ];

    public function GetAll()
    {
        return Role::all();
    }

    public function Create(Role $obj)
    {
        return $obj->save();
    }
}
