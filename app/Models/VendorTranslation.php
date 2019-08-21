<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','summary','content'];
}
