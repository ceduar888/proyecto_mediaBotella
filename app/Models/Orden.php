<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'Order';
    protected $primaryKey = 'id_order';
    public $timestamps = false;

    protected $fillable = [
        'id_cart',
        'total',
        'status',
        'delivery_address',
        'create_date',
        'last_update'
    ];

    public function GetAll()
    {
        return Orden::all();
    }

    public function GetUser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function Create(Orden $obj)
    {
        return $obj->save();
    }
}
