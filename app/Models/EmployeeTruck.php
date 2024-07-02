<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTruck extends Model
{
    use HasFactory;

    protected $table = 'employee_truck';

    protected $fillable = [
        'employee_id',
        'truck_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Define the relationship with Truck
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

}
