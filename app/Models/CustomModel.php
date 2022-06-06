<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\UUID;


class CustomModel extends Model
{
    use UUID;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';

    public static $snakeAttributes = false;

}
