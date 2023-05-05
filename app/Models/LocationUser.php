<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 'email', 'bio', 'latitude', 'longitude', 'date_of_birth'
    ];
}
