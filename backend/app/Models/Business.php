<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'locale',
        'latitude',
        'longitude',
        'limit',
    ];
    
    protected $appends = [
        'rates'
    ];
    
    public function images()
    {
        return $this->hasMany('App\Models\BusinessImage');
    }
    
    public function reviews()
    {
        return $this->morphMany('App\Models\Review', 'reviewable');
    }
    
    public function getRatesAttribute()
    {
        return !$this->reviews()->count() ? 0 : ((int) $this->reviews()->sum('rates') / $this->reviews()->count());
    }
}
