<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "Category";
    protected $primaryKey = "id_category";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'create_date',
        'last_update'
    ];

    public function GetAll()
    {
        return Categoria::all();
    }

    public function GetId($id)
    {
        return Categoria::find($id);
    }

    public function Create(Categoria $obj)
    {
        return $obj->save();
    }

    public function Editar(Categoria $obj)
    {
        return $obj->save();
    }

    public function Eliminar(Categoria $obj)
    {
       return $obj->delete();
    }
}
