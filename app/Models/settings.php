<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'phone',
        'birthday',
        'brief_about_me',
        'gender',
    ];
}
