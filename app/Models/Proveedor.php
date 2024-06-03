<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'Supplier';
    protected $primaryKey = 'id_supplier';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'address',
        'phone'
    ];

    public function GetAll()
    {
        return Proveedor::all();
    }

    public function GetId($id)
    {
        return Proveedor::find($id);
    }

    public function Create(Proveedor $obj)
    {
        return $obj->save();
    }

    public function Editar(Proveedor $obj)
    {
        return $obj->save();
    }

    public function Eliminar(Proveedor $obj)
    {
       return $obj->delete();
    }
}
