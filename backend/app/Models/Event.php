<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'category_id',
        'created_by_leader'
    ];

    /**
     * Get the color that owns the cartridge.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the color that owns the cartridge.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
