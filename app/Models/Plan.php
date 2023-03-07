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

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public static function search($filter = null)
    {
        $results = Plan::where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(1);
        return $results;
    }

      /**
     * Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
         $profile = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();


        return $profile;
    }
}
