<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'Product';
    protected $primaryKey = 'id_product';
    public $timestamps = false;

    protected $fillable = [
        'id_category',
        'name',
        'code',
        'description',
        'img',
        'create_date',
        'last_update'
    ];

    public function GetAll()
    {
        return Producto::all();
    }

    public function GetId($id)
    {
        return Producto::find($id);
    }

    public function GetCategory()
    {
        return $this->belongsTo(Categoria::class, 'id_category', 'id_category');
    }

    public function Create(Producto $obj)
    {
        return $obj->save();
    }

    public function Editar(Producto $obj)
    {
        return $obj->save();
    }

    public function Eliminar(Producto $obj)
    {
       return $obj->delete();
    }
}
