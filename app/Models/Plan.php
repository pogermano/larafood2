<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'url', 'description'
    ];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public static function search($filter = null)
    {
        $results = Plan::where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(1);
        return $results;
    }
}
