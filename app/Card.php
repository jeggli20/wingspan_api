<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        "name", 
        "scientific_name", 
        "habitat_type",
        "food_count",
        "points",
        "nest_type",
        "egg_count",
        "wingspan",
        "continent_type",
        "power_type",
        "power",
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }
}
