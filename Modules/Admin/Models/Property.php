<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends \App\Models\Property
{
    protected $fillable = [
        'published_at'
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function translations(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'property_language', 'property_id', 'language_code')
            ->withPivot(['title', 'subtitle', 'description', 'concept', 'benefits']);
    }

}