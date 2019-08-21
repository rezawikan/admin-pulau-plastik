<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchandiseTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','summary','price'];
}
