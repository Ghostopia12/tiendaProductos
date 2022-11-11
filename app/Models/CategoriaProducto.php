<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        "categoria_id",
        "producto_id"
    ];

    public function getProductoForDisplay($id){
        $objProducto = Producto::find($id);
        return $objProducto;
    }
    public function getNombreCategoriaForDisplay($id){
        $objCategoria = Categoria::find($id);
        return $objCategoria->nombre;
    }
}
