<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertifiedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 'email', 'bio', 'title', 'file', 
    ];
}
