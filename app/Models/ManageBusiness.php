<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageBusiness extends Model
{
    protected $fillable = [
        'user_id',
        'business_name',
        'legal_business_name',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function cards()
    {
        return $this->hasMany(Card::class, 'business_id');
    }
}
