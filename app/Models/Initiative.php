<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use Carbon\Carbon;

class Initiative extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'summary'];
    protected $fillable = ['image','link','created_at'];

}
