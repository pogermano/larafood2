<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable =['name', 'description'];

/**
 * Esta fuction pode ser implementada direto no ProfileController, ver exemplo no metodo search
 *
 * @param [type] $filter
 * @return void
 */
    public static function search($filter = null)
    {
        $results = Profile::where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(1);
        return $results;
    }
}
