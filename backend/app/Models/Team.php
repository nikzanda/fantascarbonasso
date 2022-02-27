<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $sortable = [
        'name'
    ];

    /**
     * Get all of the copies for the format.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
