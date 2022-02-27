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
     * Get the team that owns the event.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the category that owns the event.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
