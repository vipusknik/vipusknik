<?php

namespace App\Traits\Specialty;

trait Searchable
{
    /**
     * Includes specialties which belong to this direction
     *
     * @param integer $direction
     * @return \Illuminate\Support\Collection
     */
    public function scopeInDirection($query, $direction)
    {
        return $query
            ->whereHas('direction', function($q) use ($direction) {
                $q->where('id', is_object($direction) ? $direction->id : $direction);
            });
    }

    /**
     * Includes specialties which title or code is like query parameter
     *
     * @param string $input
     * @return \Illuminate\Support\Collection
     */
    public function scopeLike($query, $input)
    {
        return $query
            ->where('title', 'like', "%{$input}%")
            ->orWhere('code', 'like', "%{$input}%");
    }
}
