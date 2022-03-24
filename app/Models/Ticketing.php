<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    use HasFactory;

    public function getStatusAttribute()
    {
        return $this->attributes['status'] === 1 ? 'Active' : 'Inactive';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value === 'Active' ? true : false;
    }

    public function getIsFeaturedAttribute()
    {
        return $this->attributes['is_featured'] === 1 ? 'Yes' : 'No';
    }

    public function setIsFeaturedAttribute($value)
    {
        $this->attributes['is_featured'] = isset($value) ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
