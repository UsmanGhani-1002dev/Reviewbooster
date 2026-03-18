<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name','card_id','email', 'review', 'rating', 'status'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}

