<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , softDeletes;

    protected $dates = ['deleted_at'];

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //relacion uno a muchos
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    //Relacion uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion muchos a muchos in
    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    //relacion uno a muchos polimorficas
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }

    //URLS
    public function getRouteKeyName(){
        return 'slug';
    }

}
