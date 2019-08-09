<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Orderable;

class Partner extends Model
{
    use Orderable;
    protected $fillable = ['image','link','order'];
}
