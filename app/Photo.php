<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Photo extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        // $this->addMediaConversion('thumb')
        //      ->width(400)
        //      ->nonOptimized();
    }

    protected $fillable = [
        'user_id', 'collection_id', 'title', 'body', 'shot_at',
        'camera', 'lens', 'shutterspeed', 'aperture', 'iso',
        'focallength', 'ndfilter', 'tripod', 'gps', 'keywords',
            'filename', 'views',
    ];

    protected $casts = [
        'shot_at' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
