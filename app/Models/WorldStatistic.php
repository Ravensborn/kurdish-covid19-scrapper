<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldStatistic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at'];
    protected $dateFormat = 'Y-m-d';
}
