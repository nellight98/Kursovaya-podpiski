<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Tariff extends Model
{
    protected $fillable = ['name', 'description', 'price', 'duration_days'];

    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


}

