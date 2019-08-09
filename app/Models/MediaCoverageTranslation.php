<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaCoverageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','summary'];
}
