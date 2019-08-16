<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use Carbon\Carbon;

class Blog extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'slug', 'content'];
    protected $fillable = ['author_id','image','created_at'];

    public function author() {
      return $this->belongsTo(Author::class);
    }
}
