<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'business_id',
        'image',
    ];
    
    public $timestamps = false;
    
    public function business()
    {
        return $this->belongsTo('App\Models\Business');
    }
}
