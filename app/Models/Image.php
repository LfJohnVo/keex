<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type',
    ];

    //relaacion polimorficas
    public function imageable()
    {
        return $this->morphTo();
    }
}
