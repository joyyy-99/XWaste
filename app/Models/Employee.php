<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email'];

    public function trucks()
    {
        return $this->belongsToMany(Truck::class, 'employee_truck');
    }
}

