<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tariff;


class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }
}

