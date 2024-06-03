<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;

    protected $table = 'Purchasing';
    protected $primaryKey = 'id_purchasing';
    public $timestamps = false;

    protected $fillable = [
        'id_product',
        'id_supplier',
        'quantity',
        'price',
        'create_date',
        'last_update'
    ];

    public function GetAll()
    {
        return Compras::all();
    }

    public function GetId($id)
    {
        return Compras::find($id);
    }

    public function GetProduct()
    {
        return $this->belongsTo(Producto::class, 'id_product', 'id_product');
    }

    public function GetSupplier()
    {
        return $this->belongsTo(Proveedor::class, 'id_supplier', 'id_supplier');
    }

    public function Create(Compras $obj)
    {
        return $obj->save();
    }

    public function Editar(Compras $obj)
    {
        return $obj->save();
    }

    public function Eliminar(Compras $obj)
    {
       return $obj->delete();
    }
}
