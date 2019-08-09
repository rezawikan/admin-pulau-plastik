<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'slug'];
}
