<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'body'
    ];
    
    public $timestamps = false;
    
    public function businesses()
    {
        return $this->morphedByMany('App\Models\Business', 'reviewable');
    }
}
