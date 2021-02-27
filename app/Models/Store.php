<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];

    /**
     * Uma forma de informar manualmente o nome da tabela no DB
     * protected $table = 'nomeTable';
     */

     /**
      * Relacionamento pertence a: user
      */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento possui muitos: products
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
