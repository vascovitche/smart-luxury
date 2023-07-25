<?php

namespace App\Models;

class Language extends BaseModel
{
    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $keyType = 'string';

}
