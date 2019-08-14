<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Orderable;

class Episode extends Model implements TranslatableContract
{
    use Translatable, Orderable;

    public $translatedAttributes = ['title', 'summary'];
    protected $fillable = ['order'];
}
