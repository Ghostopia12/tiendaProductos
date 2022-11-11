<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function getProductoForDisplay($id){
        $objProducto = Producto::find($id);
        return $objProducto;
    }
}
