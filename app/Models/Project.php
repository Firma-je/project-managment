<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'responsible_person_first_name',
        'responsible_person_last_name',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the full name of the responsible person
     */
    public function getResponsiblePersonFullNameAttribute()
    {
        return $this->responsible_person_first_name . ' ' . $this->responsible_person_last_name;
    }

    /**
     * Scope a query to only include active projects
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include completed projects
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}