<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpisodeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','summary'];
}
