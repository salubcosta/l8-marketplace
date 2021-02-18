<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    /**
     * Relacionamento pertence a: store
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Relacionamento produtos pertencem a muitas: category
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
