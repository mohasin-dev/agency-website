<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'image',

    ];

    public function hazzPackages()
    {
        return $this->hasMany(HazzPackage::class);
    }

    public function overseasJob()
    {
        return $this->hasMany(OverseasJob::class);
    }
    public function ticketing()
    {
        return $this->hasMany(Ticketing::class);
    }
    public function gamca()
    {
        return $this->hasMany(Gamca::class);
    }
    public function orgcontact()
    {
        return $this->hasMany(OrgContact::class);
    }
}
