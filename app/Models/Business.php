<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\CustomModel;

class Business extends CustomModel
{

    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'logo'
    ];

    /**
     * Business has many branches
     */
    public function branches()
    {
        return $this->hasMany(BusinessBranches::class,'businessId','id');
    }

    /**
     * Get List Query for common purpose
     */
    public static function getListQuery()
    {
        return self::selectRaw('id,name,email,phoneNumber,logo')->has('branches')->with('branches');
    }
}
