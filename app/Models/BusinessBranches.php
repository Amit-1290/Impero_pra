<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessBranches extends CustomModel
{

    protected $fillable = [
        'associatedBusinessName',
        'name',

    ];

    /**
     * Business Branches has many images
     */
    public function brancheImages()
    {
        return $this->hasMany(BusinessBrancheImages::class,'id','businessId');
    }
}
