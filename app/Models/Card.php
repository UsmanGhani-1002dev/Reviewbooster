<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'user_id', 
        'name', 
        'business_id', 
        'google_review_link', 
        'token', 
        'type',
        'product_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taps()
    {
        return $this->hasMany(Tap::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function business()
    {
        return $this->belongsTo(ManageBusiness::class);
    }

}
