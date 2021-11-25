<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send extends Model
{
    use HasFactory;
    protected $table = 'sends';
    protected $fillable = [
        'message',
        'user_id',
        'image',
        'status',

    ];
}
