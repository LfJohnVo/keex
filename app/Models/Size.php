<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Size extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'product_id',
    ];

    //Relacion uno a muchos inversado
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //relacion muchos a muchos
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }
}
