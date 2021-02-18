<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug'];

    /**
     * Relacionamento categorias pertencem a muitos: products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
