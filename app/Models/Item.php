<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Categoria;

class Item extends Model
{
     use HasFactory;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    // Relacionamento com a categoria
    public function category(){
        return $this->belongsTo(Categoria::class, 'category_id');
    }
}
