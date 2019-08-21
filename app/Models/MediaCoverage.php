<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class MediaCoverage extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = ['media_id','link','created_at'];

    public function media() {
      return $this->belongsTo(Media::class);
    }
}
