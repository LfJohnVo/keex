<?php

namespace App\Models;

use App\Models\ColorSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //accesors
    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return  ColorSize::whereHas('size.product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return  ColorProduct::whereHas('product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }
    }

    //relacion uno a muchos
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    //Relacion uno a muchos inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //relacion muchos a muchos in
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');
    }

    //relacion uno a muchos polimorficas
    public function images()
    {
        return $this->morphMany(Image::class, "imageable");
    }

    //URLS
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
