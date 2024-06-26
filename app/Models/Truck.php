<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'model', 'registration_number'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
