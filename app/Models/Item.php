<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Item extends Model
{
     use HasFactory;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];

    protected $casts = [
        'price' => 'float',
        'quantity' => 'integer',
    ];

    // Relacionamento com a categoria
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
