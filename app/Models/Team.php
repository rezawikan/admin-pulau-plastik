<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Orderable;

class Team extends Model
{
    use Orderable;

    protected $fillable = ['name','position','image','order'];
}
