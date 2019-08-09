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

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function($model) {
    //       $model->created_at = Carbon::parse($model->created_at)->format('Y-m-d H:i:s');
    //     });
    // }

    public function author() {
      return $this->belongsTo(Author::class);
    }
}
