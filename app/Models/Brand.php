<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    use HasFactory , softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name'];

    //Relacion uno a muchos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //relacion muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
