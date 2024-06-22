<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_id',
        'pickup_date',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
