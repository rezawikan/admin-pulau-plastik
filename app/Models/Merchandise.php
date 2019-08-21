<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Orderable;

class Merchandise extends Model
{
    use Translatable, Orderable;

    public $translatedAttributes = ['name', 'summary','price'];
    protected $fillable = ['image','order'];
}
