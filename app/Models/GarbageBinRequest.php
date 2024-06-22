<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarbageBinRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_address',
        'organic_waste',
        'recyclable_waste',
        'non_recyclable_waste',
    ];

    // Relationship method to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
?>