<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Orderable
{
    public function scopeOrdered(Builder $builder, $direction = 'desc')
    {
        $builder->orderBy('order', $direction);
    }
}
