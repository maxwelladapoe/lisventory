<?php

namespace App\Models;

use App\Traits\UUIDs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class InventoryItem extends Model implements HasMedia
{
    use UUIDs, HasFactory, Searchable;
    use InteractsWithMedia;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'purchase_price' => $this->purchase_price,
            'resell_price' => $this->resell_price,
            'description' => $this->description
        ];
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Manipulations::FIT_CROP, 300, 300)
    //         ->nonQueued();
    // }
    public $with = ['firstMediaImage'];

    public function firstMediaImage(): MorphOne
    {
        return $this->morphOne(config('media-library.media_model'), 'model')
            ->where('collection_name', 'inventory_images')
            ->where('order_column', 1);
    }

    public function getMainImageUrlAttribute(): string
    {
        return $this->firstMediaImage->getUrl();
    }
}
