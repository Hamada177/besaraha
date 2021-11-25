<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';
    protected $fillable = [
        'v_ip',
        'v_date',
        'v_user_id',
        'v_sort'
    ];
}
