<?php

namespace App\Models;

use App\Enums\ImageType;
use Illuminate\Support\Facades\Storage;

class PropertyImage extends BaseModel
{
    protected $casts = [
        'type' => ImageType::class,
    ];

    public function getImagePath(): string
    {
        return 'properties/' . $this->property_id . '/' .$this->name;
    }

    public function getImageLink(): string
    {
        return Storage::url($this->getImagePath());
    }

}
