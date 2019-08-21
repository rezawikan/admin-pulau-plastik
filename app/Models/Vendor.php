<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'summary','content'];
    protected $fillable = ['image'];
}
