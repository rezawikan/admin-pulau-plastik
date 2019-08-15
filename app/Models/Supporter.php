<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Orderable;

class Supporter extends Model
{
    use Orderable;
    protected $fillable = ['image','order','link'];
}
