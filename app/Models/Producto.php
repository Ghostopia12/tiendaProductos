<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "stock",
        "precio",
        "descripcion"
    ];

    public function getFotoPerfilForDisplay()
    {
        $foto = $this->imagen;
        if ($foto == null || $foto == "") {
            $foto = "0.webp";
        }

        return $foto;
    }
}
