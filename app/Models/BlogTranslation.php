<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'slug'];

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function($model) {
    //       $model->slug = str_slug($model->title);
    //     });
    // }
}
