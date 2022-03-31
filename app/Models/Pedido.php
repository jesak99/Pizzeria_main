<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','user_id','fecha','total','estado','entrega'
    ];
}
