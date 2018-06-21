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
        $this->addMediaConversion('1600')
             ->width(1600)
             ->nonQueued();

        $this->addMediaConversion('1200')
             ->width(1200)
             ->nonQueued();

        $this->addMediaConversion('300')
             ->width(300)
             ->nonQueued();
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

    public static function getExif($photo)
    {
        // get the exif data
        $adapter = new \PHPExif\Adapter\Exiftool(
            [
                'toolPath'  => '/usr/local/bin/exiftool',
            ]
        );

        $reader = new \PHPExif\Reader\Reader($adapter);
        return $reader->read($photo);
    }
}
