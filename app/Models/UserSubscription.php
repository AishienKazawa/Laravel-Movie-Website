<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "level",
        "price",
        "subscription_status",
        "subscription_expiration",
    ];

    // relationship between the current model and the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
