<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
   protected $fillable = ['name', 'description', 'price', 'duration_days', 'card_limit', 'review_limit'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
