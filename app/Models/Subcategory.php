<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //relación uno a muchos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //relacion uno a muchos inversado
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //URLS
    public function getRouteKeyName(){
        return 'slug';
    }

}
