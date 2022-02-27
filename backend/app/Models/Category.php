<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $sortable = [
        'description',
        'points'
    ];

    /**
     * Get all of the events for the format.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
