<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Color extends Model
{
    use HasFactory , softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name'];

    //relacion muchos a muchos
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

}
