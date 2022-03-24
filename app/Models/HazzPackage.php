<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HazzPackage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'country_id',
        'short_description',
        'package_overview',
        'itinerary',
        'hotel_details',
        'notes',
        'policy',
        'rate_and_dates',
        'is_featured',
        'featured_image',
        'status',
    ];

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
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
